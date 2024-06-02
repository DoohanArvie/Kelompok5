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

class BookingController extends Controller
{
    public function showAvailabilityForm($vehicle_type, $vehicle_id)
    {
        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);
        $isAvailable = false;
        return view('frontend.vehicle.check_availability', compact('vehicle', 'isAvailable', 'vehicle_type'));
    }

    public function checkVehicleAvailability(Request $request, $vehicle_type, $vehicle_id)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $with_driver = $request->input('with_driver', false);
        $pickup = $request->input('pickup', false);
        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);

        $today = (new \DateTime())->format('Y-m-d');
        $maxStartDate = (new \DateTime())->modify('+60 days')->format('Y-m-d');

        if ($startDate > $maxStartDate) {
            return redirect()->back()->with('error', 'Maksimal tanggal mulai sewa adalah 60 hari kedepan!');
        }

        if ($startDate < $today) {
            return redirect()->back()->with('error', 'Tanggal mulai tidak boleh berada di masa lalu!');
        }

        if ($endDate < $startDate) {
            return redirect()->back()->with('error', 'Tanggal selesai tidak boleh sebelum tanggal mulai!');
        }

        $startDateTime = new \DateTime($startDate);
        $endDateTime = new \DateTime($endDate);
        $dateInterval = $startDateTime->diff($endDateTime)->days;
        if ($dateInterval > 7) {
            return redirect()->back()->with('error', 'Durasi maksimal sewa adalah 7 hari!');
        }

        $isAvailable = Booking::where('vehicle_id', $vehicle_id)
            ->where('vehicle_type', $vehicle_type)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('start_date', [$startDate, $endDate])
                        ->orWhereBetween('end_date', [$startDate, $endDate])
                        ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                        ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
                });
            })->doesntExist();

        if (!$isAvailable) {
            return redirect()->back()->with('error', 'Kendaraan tidak tersedia pada tanggal yang dipilih!');
        }

        // Check if user is verified
        if (auth()->user()->account_status !== 'Terverifikasi') {
            return redirect()->back()->with('error', 'Akun harus terverifikasi dahulu agar bisa sewa!');
        }

        return view('frontend.vehicle.check_availability', compact('isAvailable', 'startDate', 'endDate', 'with_driver', 'pickup', 'vehicle', 'vehicle_type'));
    }


    public function showBookingForm(Request $request, $vehicle_type, $vehicle_id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'with_driver' => 'required|boolean',
            'pickup' => 'required|in:Ambil Sendiri,Diantar Sesuai Alamat',
        ]);

        $vehicle = $this->getVehicleByType($vehicle_type, $vehicle_id);

        $user = Auth::user();
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

        return view('frontend.vehicle.booking_form', compact('vehicle', 'vehicle_type', 'user', 'startDate', 'endDate', 'daysCount', 'bookingFee', 'with_driver', 'pickup', 'driverFee', 'totalFee'));
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
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'days_count' => $daysCount,
            'booking_fee' => $bookingFee,
            'with_driver' => $request->with_driver,
            'pickup' => $request->pickup,
            'driver_fee' => $driverFee,
            'total_fee' => $totalFee,
            'booking_status' => 'Menunggu Pembayaran',
            'booking_code' => $bookingCode,
        ]);

        return redirect()->route('booking_confirmation', ['booking_code' => $bookingCode, 'vehicle_type' => $vehicle_type, 'vehicle_id' => $vehicle_id]);
    }

    public function showBookingConfirmation($booking_code)
    {
        $booking = Booking::where('booking_code', $booking_code)->with('user')->firstOrFail();

        if ($booking->vehicle_type == 'car') {
            $vehicle = Car::find($booking->vehicle_id);
        } else {
            $vehicle = Motorcycle::find($booking->vehicle_id);
        }
        return view('frontend.vehicle.booking_confirmation', compact('booking', 'vehicle'));
    }

    private function getVehicleByType($vehicle_type, $vehicle_id)
    {
        if ($vehicle_type == 'car') {
            return Car::findOrFail($vehicle_id);
        } elseif ($vehicle_type == 'motorcycle') {
            return Motorcycle::findOrFail($vehicle_id);
        } else {
            throw new \Exception('Invalid vehicle type');
        }
    }
}
