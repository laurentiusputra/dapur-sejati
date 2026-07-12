<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// 🔒 Import kontrak keamanan resmi dari Filament
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

// 🛠️ UPDATE: Menyisipkan 'avatar', 'address', dan 'bio' ke dalam PHP 8 Attribute Fillable bawaan Laravel
#[Fillable([
    'name', 'email', 'password', 'avatar', 'address', 'bio', 
    'phone', 'city_district', 'address_line', 'address_detail', 'address_type', 'birth_date', 'gender'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * 🔒 FITUR SECURITY: Membatasi Hak Akses ke /superadmin
     * Otomatis menendang customer umum agar tidak bisa masuk ke dashboard katering
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // 🛠️ DITAMBAHKAN KONDISI LAPISAN PERTAMA: Wajib ter autentikasi & memiliki ID pengguna aktif
        if (!auth()->check() || !$this->id) {
            return false;
        }

        // Jalur validasi email admin & role superadmin milikmu tetap terjaga utuh 100%
        return $this->email === 'admin@gmail.com' || $this->email === 'laurentiusputra85@gmail.com' || $this->email === 'laurentiusputra29@gmail.com' || $this->email === 'k.yuliani84@gmail.com'
            || str_ends_with($this->email, '@dapursejati.com') 
            || ($this->role ?? null) === 'superadmin';
    }
}