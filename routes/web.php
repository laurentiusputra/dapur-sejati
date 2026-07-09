<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CatalogController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes - Dapur Sejati (Premium Emerald & Gold Edition)
|--------------------------------------------------------------------------
*/

// Halaman Beranda Utama (Landing Page)
Route::get('/', [CatalogController::class, 'index'])->name('home');

// Halaman Menu Terpisah / Standalone Page
Route::get('/menu', [CatalogController::class, 'index'])->name('menu');

// Proses Simpan Pesanan / Checkout POST Form
Route::post('/checkout', [OrderController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('checkout');

// Jalur Akses Login Internal (Owner, Admin, Merchant)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Sisa Aliran Routing Navbar Pendukung
Route::get('/cart', function () { return redirect()->route('home'); })->name('cart');
Route::get('/contact', function () { return redirect()->route('home'); })->name('contact');

// Menampilkan Halaman Review
Route::get('/review', [ReviewController::class, 'index'])->name('review');

// Memproses Form Review yang Dikirim (Ini rute yang tadi error)
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');


// Halaman About Us Bertumpuk
Route::get('/about', function () {
    return view('customer.about');
})->name('about');

/* =========================================================================
   🛠️ SEKTOR BARU: Route ekspansi untuk Daily Menu (Ready Setiap Hari)
   Sementara diproteksi dengan redirect() ke 'home' biar gak error pas ditest!
   ========================================================================= */
Route::get('/daily-menu', function () {
    return redirect()->route('home');
})->name('daily.menu');


// Sisa Aliran Routing Navbar Pendukung
Route::get('/cart', function () { return redirect()->route('home'); })->name('cart');
Route::get('/review', function () { return redirect()->route('home'); })->name('review');
Route::get('/contact', function () { return redirect()->route('home'); })->name('contact');

Route::get('/review', [ReviewController::class, 'index'])->name('review');