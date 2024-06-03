<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Feedback;
use App\Http\Requests\Frontend\FeedbackRequest;
use App\Http\Controllers\Controller;
use App\Models\Motorcycle;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        // Validasi input
        $validated = $request->validated();

        // Debugging
        \Log::info('Feedback received: ', $validated);

        // Simpan feedback ke dalam database
        Feedback::create($validated);

        // Mendapatkan nilai booking_code, vehicle_type, dan vehicle_id
        $bookingCode = $request->input('booking_code');
        $vehicleType = $request->input('vehicle_type');
        $vehicleId = $request->input('vehicle_id');

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('booking_confirmation', [
            'booking_code' => $bookingCode,
            'vehicle_type' => $vehicleType,
            'vehicle_id' => $vehicleId
        ])->with('success', 'Feedback berhasil disimpan.');
    }

}
