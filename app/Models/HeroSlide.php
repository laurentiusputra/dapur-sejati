<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    // Daftarkan semua kolom agar diizinkan masuk ke database Supabase
    protected $fillable = [
        'badge',
        'title',
        'description',
        'image_path',
        'button_text',
        'button_url',
        'sort_order',
        'is_active',
    ];
}