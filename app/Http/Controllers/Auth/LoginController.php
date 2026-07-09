<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Mengarah ke file view login kamu (misal: resources/views/auth/login.blade.php)
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        // Logika autentikasi owner, admin, merchant di sini
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}