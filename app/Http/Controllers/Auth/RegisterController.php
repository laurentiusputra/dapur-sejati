<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran akun baru.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Mengarah ke resources/views/auth/register.blade.php
    }

    /**
     * Memproses pendaftaran dan pembuatan data user baru.
     */
    public function register(Request $request)
    {
        // 1. Jalankan validasi data register
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Memastikan password cocok dengan password_confirmation
        ]);

        // 2. Simpan user baru ke database PostgreSQL / Supabase
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password demi keamanan
        ]);

        // 3. Otomatis login-kan pengguna yang baru daftar
        Auth::login($user);

        // 4. Lempar pengguna ke halaman akun utama mereka
        return redirect()->route('customer.account');
    }
}