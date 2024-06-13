<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Booking;
use App\Models\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Feedback;
use Illuminate\Support\Facades\Gate;

class BookingController extends Controller
{
    public function showAvailabilityForm($vehicle_type, $vehicle_id)
    {
        $user = Auth::user();
        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);
        $isAvailable = false;

        return view('frontend.vehicle.check_availability', compact('vehicle', 'isAvailable', 'vehicle_type', 'user'));
    }

    public function checkVehicleAvailability(Request $request, $vehicle_type, $vehicle_id)
    {
        $user = Auth::user();

        // Check if user is verified
        if ($user->account_status !== 'Terverifikasi' && is_null($user->email_verified_at)) {
            return redirect()->back()->with('error', 'Akun harus terverifikasi dan email harus sudah diverifikasi agar bisa sewa!');
        }elseif($user->account_status !== 'Terverifikasi'){
            return redirect()->back()->with('error', 'Akun harus terverifikasi agar bisa sewa!');
        }elseif(is_null($user->email_verified_at)){
            return redirect()->back()->with('error', 'Email harus sudah diverifikasi agar bisa sewa!');
        }

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $with_driver = $request->input('with_driver', false);
        $pickup = $request->input('pickup', false);
        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);

        // Additional date validations
        $today = (new \DateTime())->format('Y-m-d');
        $maxStartDate = (new \DateTime())->modify('+60 days')->format('Y-m-d');

        if ($startDate > $maxStartDate || $startDate < $today || $endDate < $startDate) {
            return redirect()->back()->with('error', 'Tanggal yang dipilih tidak valid!');
        }

        $isAvailable = Booking::where('vehicle_id', $vehicle_id)
            ->where('vehicle_type', $vehicle_type)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                    ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
            })->doesntExist();

        if (!$isAvailable) {
            return redirect()->back()->with('error', 'Kendaraan tidak tersedia pada tanggal yang dipilih!');
        }

        return view('frontend.vehicle.check_availability', compact('isAvailable', 'startDate', 'endDate', 'with_driver', 'pickup', 'vehicle', 'vehicle_type', 'user'));
    }



    public function showBookingForm(Request $request, $vehicle_type, $vehicle_id)
    {
        $user = Auth::user();
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'with_driver' => 'required|boolean',
            'pickup' => 'required|in:Ambil Sendiri,Diantar Sesuai Alamat',
        ]);

        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $daysCount = (new \DateTime($endDate))->diff(new \DateTime($startDate))->days + 1;
        $bookingFeePerDay = $vehicle->price;
        $bookingFee = $daysCount * $bookingFeePerDay;
        $with_driver = $request->with_driver;
        $pickup = $request->pickup;
        $driver = Driver::first();

        $driverFee = $with_driver ? ($daysCount * $driver->biaya_driver) : 0;
        $totalFee = $bookingFee + $driverFee;

        return view('frontend.vehicle.booking_form', compact('vehicle', 'vehicle_type', 'user', 'startDate', 'endDate', 'daysCount', 'bookingFee', 'with_driver', 'pickup', 'driverFee', 'totalFee', 'user'));
    }

    public function bookVehicle(Request $request, $vehicle_type, $vehicle_id)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $daysCount = (new \DateTime($endDate))->diff(new \DateTime($startDate))->days + 1;
        $bookingFeePerDay = $vehicle->price;
        $bookingFee = $daysCount * $bookingFeePerDay;

        $with_driver = $request->with_driver;
        $pickup = $request->pickup;
        $driver = Driver::first();

        $driverFee = $with_driver ? ($daysCount * $driver->biaya_driver) : 0;
        $totalFee = $bookingFee + $driverFee;

        $bookingCode = strtoupper(Str::random(5));

        $booking = Booking::create([
            'vehicle_type' => $vehicle_type,
            'vehicle_id' => $vehicle_id,
            'user_id' => $user->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'days_count' => $daysCount,
            'booking_fee' => $bookingFee,
            'with_driver' => $with_driver,
            'pickup' => $pickup,
            'driver_fee' => $driverFee,
            'total_fee' => $totalFee,
            'booking_status' => 'Menunggu Pembayaran',
            'booking_code' => $bookingCode,
        ]);

        return redirect()->route('booking_confirmation', ['booking_code' => $bookingCode, 'vehicle_type' => $vehicle_type, 'vehicle_id' => $vehicle_id]);
    }


    public function showBookingConfirmation($booking_code)
    {
        $user = Auth::user();
        $booking = Booking::where('booking_code', $booking_code)->with('user')->firstOrFail();

        // Ensure the booking belongs to the logged-in user
        if (Gate::denies('view', $booking) && !$user->is_admin) {
            return redirect()->route('homepage')->with('error', 'Anda tidak memiliki akses ke pemesanan ini.');
        }

        $feedbacks = Feedback::where('booking_code', $booking_code)->get();
        $vehicle = $booking->vehicle_type == 'car' ? Car::find($booking->vehicle_id) : Motorcycle::find($booking->vehicle_id);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $booking->total_fee,
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $booking->snap_token = $snapToken;
        $booking->save();

        return view('frontend.vehicle.booking_confirmation', compact('booking', 'vehicle', 'feedbacks', 'user'));
    }


    private function getVehicleByType($vehicle_type, $vehicle_id)
    {
        $user = Auth::user();
        if ($vehicle_type == 'car') {
            return Car::findOrFail($vehicle_id);
        } elseif ($vehicle_type == 'motorcycle') {
            return Motorcycle::findOrFail($vehicle_id);
        } else {
            throw new \Exception('Invalid vehicle type');
        }
    }

    public function showBookingSuccess($booking_code)
    {
        $user = Auth::user();
        $booking = Booking::where('booking_code', $booking_code)->firstOrFail();
        
        // Ensure the booking belongs to the logged-in user
        if (Gate::denies('view', $booking) && !$user->is_admin) {
            return redirect()->route('homepage')->with('error', 'Anda tidak memiliki akses ke pemesanan ini.');
        }

        $booking->booking_status = 'Pembayaran Terkonfirmasi';
        $booking->save();

        $userHasGivenFeedback = Feedback::where('user_id', $user->id)
            ->where('booking_code', $booking_code)
            ->exists();

        return view('frontend.vehicle.booking_success', compact('booking', 'userHasGivenFeedback', 'user'));
    }

}
