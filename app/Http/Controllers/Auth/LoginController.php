<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan formulir login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarah ke resources/views/auth/login.blade.php
    }

    /**
     * Memproses autentikasi login pengguna.
     */
    public function login(Request $request)
    {
        // 1. Validasi inputan dari form login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba lakukan login menggunakan Auth Guard
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan terhindar dari session fixation
            $request->session()->regenerate();

            // Alihkan langsung ke halaman dashboard akun customer
            return redirect()->route('customer.account');
        }

        // 3. Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Memproses pengeluaran akun secara aman (POST).
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Bersihkan dan hancurkan session lama pengguna
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}