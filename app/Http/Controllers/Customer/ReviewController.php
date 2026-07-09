<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Review; // Nanti jangan lupa di-uncomment kalau Model-nya sudah dibuat

class ReviewController extends Controller
{
    // Method untuk menampilkan halaman review
    public function index()
    {
        return view('customer.review');
    }

    // Method untuk menangkap data form dan menyimpannya ke PostgreSQL
    public function store(Request $request)
    {
        // 1. Validasi input dari user agar aman
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        // 2. Simpan ke Database (Pastikan kamu sudah buat Model & Migration tabel reviews)
        /*
        Review::create([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
            // Jika nanti sudah pakai login Google, tambahkan ID usernya:
            // 'user_id' => auth()->id(), 
        ]);
        */

        // 3. Kembali ke halaman review dengan pesan sukses
        return redirect()->route('review')->with('success', 'Terima kasih! Ulasan kamu berhasil dikirim.');
    }
}