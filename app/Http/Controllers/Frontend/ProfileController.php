<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vehicle;


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
        $user->account_status = 'Menunggu Verifikasi';
        $user->save();
        
        return redirect()->back()->with('status', 'Profile updated!')->with('user', $user);
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah password saat ini benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('status', 'Password berhasil di ubah');
    }
}
