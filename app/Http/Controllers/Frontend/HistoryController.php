<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $bookings = Booking::where('user_id', $user->id)->get();

        return view('frontend.history.index', compact('user', 'bookings'));
    }
}
