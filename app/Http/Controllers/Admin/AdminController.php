<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index()
    {
        $admins = User::where('is_admin', 1)->get();

        return view('admin.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'is_admin' => 'required|boolean',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->input('is_admin', 1), // Gunakan input dari request atau default 1
            'account_status' => 'Terverifikasi'
        ]);


        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/avatars');
            $admin->avatar = basename($avatarPath);
            $admin->save();
        }

        return redirect()->route('admin.admin.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = User::where('is_admin', 1)->first();
        
        if ($request->hasFile('avatar')) {
            if ($admin->avatar) {
                Storage::delete('public/avatars/' . $admin->avatar);
            }
            $avatarPath = $request->file('avatar')->store('public/avatars');
            $admin->avatar = basename($avatarPath);
        }
        
        $admin->update($request->all());

        return redirect()->route('admin.admin.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ambil user yang sedang login
        $admin = Auth::user();

        // Cek apakah password saat ini benar
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        // Update password
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->back()->with('status', 'Password berhasil di ubah');
    }
}
