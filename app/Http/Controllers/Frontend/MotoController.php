<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\BookingRequest;
use App\Models\Booking;
use App\Models\Feedback;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $motos = Motorcycle::where('status',1);
        
        if($request->category_id && $request->penumpang){
            $motos = $motos->Where('type_id',$request->category_id)->Where('penumpang','>=',$request->penumpang);
        }
        
        $motos = $motos->get();
        return view('frontend.moto.index', compact('motos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function store(BookingRequest $request)
    {
        Booking::create($request->validated());

        return redirect()->back()->with([
            'message' => 'kami akan menghubungi anda secepatnya !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motos = Motorcycle::findorFail($id);
        $feedbacks = Feedback::where('vehicle_type', 'motorcycle')->where('vehicle_id', $id)->get();
        return view('frontend.moto.show', compact('motos', 'feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
}