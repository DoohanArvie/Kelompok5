<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('frontend.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'sim' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('public/ktp');
            $user->ktp = basename($ktpPath);
        }

        if ($request->hasFile('sim')) {
            $simPath = $request->file('sim')->store('public/sim');
            $user->sim = basename($simPath);
        }

        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        
        return redirect()->back()->with('status', 'Profile updated!')->with('user', $user);
    }
}
