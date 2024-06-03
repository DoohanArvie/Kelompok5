<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'booking_code',
        'vehicle_type',
        'vehicle_id',
        'feedback',
        'rating',
        'user_name'
    ];
}
