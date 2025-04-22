<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login'); // menampilkan halaman login
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi data login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, perbarui session dan arahkan ke halaman produk
            $request->session()->regenerate();
            return redirect()->intended('/products'); // Menggunakan intended agar bisa redirect ke halaman yang sebelumnya diakses sebelum login
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        // Proses logout dan invalidasi session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect kembali ke halaman login
        return redirect('/login');
    }
}
