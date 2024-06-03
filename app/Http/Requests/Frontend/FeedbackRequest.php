<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Sesuaikan dengan kebutuhan otorisasi
    }

    public function rules()
    {
        return [
            'booking_code' => 'required|string',
            'vehicle_type' => 'required|string',
            'vehicle_id' => 'required|integer',
            'feedback' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'user_name' => 'required|string'
        ];
    }
}

