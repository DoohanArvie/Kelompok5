<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Type;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\TypeMotorcycle;

class HomepageController extends Controller
{
    public function index(Request $request)
    {

        $cars = Car::where('status', 1)->get();
        $motorcycles = Motorcycle::where('status', 1)->get();
        $feedbacks = Feedback::inRandomOrder()->take(7)->get();
        $types = Type::get(['id', 'nama']);
        $typemotorcycles = TypeMotorcycle::get(['id', 'nama']);

        return view('frontend.homepage', compact('cars', 'motorcycles', 'feedbacks', 'types', 'typemotorcycles'));
    }
}
