<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;


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
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'sim' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('public/avatars');
            $user->avatar = basename($avatarPath);
        }

        if ($request->hasFile('ktp')) {
            if ($user->ktp) {
                Storage::delete('public/ktp/' . $user->ktp);
            }
            $ktpPath = $request->file('ktp')->store('public/ktp');
            $user->ktp = basename($ktpPath);
        }

        if ($request->hasFile('sim')) {
            if ($user->sim) {
                Storage::delete('public/sim/' . $user->sim);
            }
            $simPath = $request->file('sim')->store('public/sim');
            $user->sim = basename($simPath);
        }


        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->account_status = 'Menunggu Verifikasi';
        $user->save();

        Feedback::where('user_id', $user->id)->update(['avatar' => $user->avatar]);

        return redirect()->back()->with('status', 'Profile berhasil di update')->with('user', $user);
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
