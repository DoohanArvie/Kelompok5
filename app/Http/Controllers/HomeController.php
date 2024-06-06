<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Type;
use App\Models\TypeMotorcycle;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\User;
use App\Models\Contact;
use App\Models\Feedback;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Menghitung jumlah booking dengan status "Menunggu Pembayaran"
        $countMenungguPembayaran = Booking::where('booking_status', 'Menunggu Pembayaran')->count();
        $countPembayaranTerkonfirmasi = Booking::where('booking_status', 'Pembayaran Terkonfirmasi')->count();
        $countBelumDikembalikan = Booking::where('booking_status', 'Belum Dikembalikan')->count();

        $countJenisMobil =  Type::count();
        $countJenisMotor =  TypeMotorcycle::count();
        $countJenisKendaraan =  $countJenisMobil + $countJenisMotor;

        $countJumlahMobil =  Car::count();
        $countJumlahMotor =  Motorcycle::count();
        $countJumlahKendaraan =  $countJumlahMobil + $countJumlahMotor;

        //Total Sewa 
        $countBooking = Booking::count();

        //User
        $countUser = User::count();

        //Hubungi Kami 
        $countHubungiKami = Contact::count();

        $bookings = Booking::orderBy('created_at', 'desc')->get();
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        $users = User::get();
        // Mengirim data ke view
        return view(
            'home',
            compact(
                'countMenungguPembayaran',
                'countPembayaranTerkonfirmasi',
                'countBelumDikembalikan',
                'countJenisKendaraan',
                'countJumlahKendaraan',
                'countBooking',
                'countUser',
                'countHubungiKami',
                'bookings',
                'users',
                'feedbacks'
            )
        );
    }
}
