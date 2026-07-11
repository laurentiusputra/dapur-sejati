<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Daftarkan semua kolom Supabase + kolom pelengkap agar bisa di-seed
    protected $fillable = [
        'name', 
        'description', 
        'image_path', 
        'price', 
        'stock', 
        'category', 
        'quota'
    ]; 
}