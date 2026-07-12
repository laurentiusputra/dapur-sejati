<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    // 1. Arahkan user ke halaman Login Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Tangkap data balik dari Google
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user sudah ada di database berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika belum ada, buatkan user baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'avatar' => $googleUser->getAvatar(), // [BARU DITAMBAHKAN] Menyimpan link foto profil dari Google Account
                    'password' => Hash::make(uniqid()), // Password acak karena login via Google
                ]);
            } else {
                // [BARU DITAMBAHKAN] Memastikan foto profil Google selalu sinkron dan pas saat login kembali
                $user->update([
                    'avatar' => $googleUser->getAvatar()
                ]);
            }

            // Login user tersebut
            Auth::login($user);

            // Arahkan ke halaman beranda atau keranjang
            return redirect()->route('home')->with('success', 'Berhasil login dengan Google!');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login dengan Google, silakan coba lagi.');
        }
    }
}