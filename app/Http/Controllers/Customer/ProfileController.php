<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'address' => ['nullable', 'string'],
            'bio' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'max:2048'], // Maksimal 2MB jika upload lokal
            
            // [BARU DITAMBAHKAN] Validasi tambahan agar cocok dengan form biodata & alamat terstruktur
            'name'           => ['required', 'string', 'max:255'],
            'phone'          => ['nullable', 'string', 'max:20'],
            'birth_date'     => ['nullable', 'date'],
            'gender'         => ['nullable', 'string'],
            'city_district'  => ['nullable', 'string', 'max:255'],
            'address_type'   => ['nullable', 'string'],
            'address_line'   => ['nullable', 'string'],
            'address_detail' => ['nullable', 'string'],
        ]);

        // Logika jika user mengunggah foto profil lokal baru
        if ($request->hasFile('avatar')) {
            // Upload ke Supabase S3 Storage kamu
            $path = $request->file('avatar')->store('avatars', 's3');
            $user->avatar = $path;
        }

        $user->address = $request->input('address');
        $user->bio = $request->input('bio');

        // [BARU DITAMBAHKAN] Menyimpan seluruh data inputan baru ke dalam properti user sebelum di-save
        $user->name           = $request->input('name');
        $user->phone          = $request->input('phone');
        $user->birth_date     = $request->input('birth_date');
        $user->gender         = $request->input('gender');
        $user->city_district  = $request->input('city_district');
        $user->address_type   = $request->input('address_type');
        $user->address_line   = $request->input('address_line');
        $user->address_detail = $request->input('address_detail');

        $user->save();

        return back()->with('success_profile', 'Informasi akun berhasil diperbarui!');
    }
}