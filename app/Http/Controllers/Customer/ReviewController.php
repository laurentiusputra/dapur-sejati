<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Menampilkan halaman ulasan pelanggan (Review Page)
     */
    public function index()
    {
        // Besok-besok kalau lo udah bikin tabel review di database (migration), 
        // lo tinggal panggil datanya di sini, misal: $reviews = Review::all();
        // Dan lempar ke view lewat compact('reviews')
        
        return view('customer.review');
    }
}