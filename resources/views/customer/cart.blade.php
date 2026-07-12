@extends('customer.layouts.app')

@section('title', 'Keranjang Belanja - Dapur Sejati')

@section('content')
<section class="bg-[#f4ebd0] pt-40 pb-24 min-h-screen font-sans">
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-brand-copper-900/10">
            <a href="{{ route('menu') }}" class="inline-flex items-center text-sm font-bold text-brand-deep-forest hover:text-brand-orange-600 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                KEMBALI MENU
            </a>
            <h1 class="text-xl font-heading font-black text-brand-deep-forest tracking-wider uppercase">Shopping Cart</h1>
            
            @if(count($cart) > 0)
                <form action="{{ route('cart.clear') }}" method="POST" class="m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua pesanan dari keranjang?');">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-brand-velvet-600 hover:text-brand-velvet-800 transition-colors flex items-center gap-1 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Bersihkan
                    </button>
                </form>
            @else
                <div></div>
            @endif
        </div>

        @if(session('success'))
            <div class="mb-6 bg-brand-matcha-100 border border-brand-matcha-300 text-brand-matcha-900 px-6 py-4 rounded-2xl text-center font-medium shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-7 space-y-4">
                
                @if(count($cart) > 0)
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex items-center gap-3">
                        <input type="checkbox" checked class="w-5 h-5 rounded border-slate-300 text-brand-deep-forest focus:ring-brand-deep-forest cursor-pointer">
                        <span class="font-bold text-brand-deep-forest text-sm">Pilih Semua ({{ count($cart) }})</span>
                    </div>

                    @foreach($cart as $id => $details)
                        <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex flex-col sm:flex-row items-start sm:items-center gap-4 transition-all hover:shadow-md">
                            <input type="checkbox" checked class="w-5 h-5 rounded border-slate-300 text-brand-deep-forest focus:ring-brand-deep-forest cursor-pointer mt-1 sm:mt-0">
                            
                            @php
                                $imageSrc = null;
                                if ($details['image']) {
                                    if (\Illuminate\Support\Str::startsWith($details['image'], ['http://', 'https://'])) {
                                        $imageSrc = $details['image'];
                                    } elseif (Storage::disk('public')->exists($details['image'])) {
                                        $imageSrc = asset('storage/' . $details['image']);
                                    } else {
                                        $possiblePaths = [
                                            $details['image'],
                                            'img/products/daily/' . $details['image'],
                                            'img/products/po/' . $details['image'],
                                            'img/products/special/' . $details['image'],
                                        ];
                                        foreach ($possiblePaths as $pp) {
                                            if (file_exists(public_path($pp))) {
                                                $imageSrc = asset($pp);
                                                break;
                                            }
                                        }
                                    }
                                }
                            @endphp

                            @if($imageSrc)
                                <img src="{{ $imageSrc }}" class="w-20 h-20 object-cover rounded-xl bg-slate-50" alt="{{ $details['name'] }}">
                            @else
                                <div class="w-20 h-20 bg-slate-100 rounded-xl flex items-center justify-center text-[10px] text-slate-400 text-center p-2">
                                    No Image
                                </div>
                            @endif
                            
                            <div class="flex-1 w-full">
                                <h4 class="font-bold text-brand-deep-forest text-base leading-tight">{{ $details['name'] }}</h4>
                                <p class="text-[11px] text-slate-400 mt-0.5">Rp {{ number_format($details['price'], 0, ',', '.') }} / porsi</p>
                            </div>

                            <div class="flex items-center justify-between w-full sm:w-auto gap-6 sm:gap-4 mt-2 sm:mt-0">
                                
                                <div class="flex items-center border border-slate-200 rounded-full bg-slate-50 overflow-hidden">
                                    <form action="{{ route('cart.decrease') }}" method="POST" class="m-0 p-0 flex items-center">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-brand-deep-forest hover:bg-slate-200 transition-colors cursor-pointer">-</button>
                                    </form>

                                    <span class="w-8 text-center text-sm font-bold text-brand-deep-forest">{{ $details['quantity'] }}</span>
                                    
                                    <form action="{{ route('cart.add') }}" method="POST" class="m-0 p-0 flex items-center">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}"> 
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-brand-deep-forest hover:bg-slate-200 transition-colors cursor-pointer">+</button>
                                    </form>
                                </div>
                                
                                <div class="text-right flex-1 sm:flex-none">
                                    <p class="font-bold text-brand-deep-forest text-sm">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</p>
                                    
                                    <form action="{{ route('cart.remove') }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="text-[10px] text-brand-velvet-500 hover:text-brand-velvet-700 font-bold mt-1 cursor-pointer">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white rounded-3xl p-10 shadow-sm border border-slate-100 flex flex-col items-center justify-center text-center min-h-[300px]">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-brand-deep-forest mb-2">Keranjangmu Masih Kosong</h3>
                        <p class="text-sm text-slate-500 mb-6">Yuk, pilih menu hidangan lezat favoritmu sekarang!</p>
                        <a href="{{ route('menu') }}" class="px-6 py-2.5 bg-brand-pantone-gold-cream hover:bg-brand-pantone-dark-gold text-white rounded-full font-bold text-sm transition-colors shadow-sm">
                            Lihat Katalog Menu
                        </a>
                    </div>
                @endif
            </div>

            <div class="lg:col-span-5">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 sticky top-32">
                    
                    <!-- =========================================================================
                         🎫 BANNER STATUS AUTENTIKASI DINAMIS (GUEST VS LOGGED IN USER)
                         ========================================================================= -->
                    @auth
                        <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center justify-between gap-4">
                            <div class="flex items-center gap-2.5">
                                <span class="text-base select-none">✨</span>
                                <div>
                                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-wide">You're already logged in!</h4>
                                    <p class="text-[10px] text-slate-500 font-medium mt-0.5">
                                        Masuk sebagai <span class="font-bold text-brand-copper-600">{{ auth()->user()->name }}</span>.
                                    </p>
                                </div>
                            </div>
                            <span class="bg-emerald-100 text-emerald-800 text-[9px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider border border-emerald-200 shadow-sm select-none">
                                Active
                            </span>
                        </div>
                    @else
                        <div class="mb-6 p-4 bg-brand-honey-50 border border-brand-honey-200 rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <h4 class="text-xs font-bold text-brand-honey-900">Punya akun?</h4>
                                <p class="text-[10px] text-brand-honey-700 mt-0.5">Login untuk isi otomatis</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- Tombol 1: Google Account -->
                                <a href="{{ route('google.login') }}" class="px-3 py-1.5 bg-white border border-brand-honey-300 rounded-full text-[10px] font-bold text-brand-honey-800 hover:bg-brand-honey-100 transition-colors flex items-center gap-1.5 shadow-sm">
                                    <svg class="w-3 h-3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                    </svg>
                                    Login Google
                                </a>
                                <!-- Tombol 2: Sign In via Dapur Sejati Email -->
                                <a href="{{ route('login') }}" class="px-3 py-1.5 bg-brand-wood-800 hover:bg-brand-wood-950 text-white rounded-full text-[10px] font-bold transition-colors flex items-center gap-1 shadow-sm">
                                    <span>✉️</span>
                                    Email
                                </a>
                            </div>
                        </div>
                    @endauth

                    <h3 class="font-bold text-brand-deep-forest text-sm uppercase tracking-wider mb-4 pb-2 border-b border-slate-100">Alamat Pengiriman</h3>
                    
                    <form action="{{ route('order.store') }}" method="POST" id="checkout-form">
                        @csrf
                        <div class="space-y-4 mb-6">
                            
                            <!-- 🛠️ UPDATE: Melepas logic disabled pada semua field agar guest/pengunjung umum bisa mengisi form kapan saja -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <input type="text" name="customer_name" value="{{ auth()->check() ? auth()->user()->name : old('customer_name') }}" placeholder="Nama Lengkap *" class="w-full text-sm px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-brand-copper-500 transition-colors" required>
                                </div>
                                <div>
                                    <input type="tel" name="phone" value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}" placeholder="No. Telepon *" class="w-full text-sm px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-brand-copper-500 transition-colors" required>
                                </div>
                            </div>

                            <div class="relative">
                                <input type="text" name="city_district" value="{{ auth()->check() ? auth()->user()->city_district : old('city_district') }}" placeholder="Provinsi, Kota, Kec, Kode Pos (Cth: Jawa Barat, Bekasi...)" class="w-full text-sm px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-brand-copper-500 transition-colors cursor-pointer" required>
                                <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>

                            <div>
                                <textarea name="address_line" rows="2" placeholder="Nama Jalan, Gedung, No. Rumah *" class="w-full text-sm px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-brand-copper-500 transition-colors resize-none" required>{{ auth()->check() ? auth()->user()->address_line : old('address_line') }}</textarea>
                            </div>

                            <div>
                                <input type="text" name="address_detail" value="{{ auth()->check() ? auth()->user()->address_detail : old('address_detail') }}" placeholder="Detail Lainnya (Cth: Blok / Unit No., Patokan)" class="w-full text-sm px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-brand-copper-500 transition-colors">
                            </div>

                            <button type="button" class="w-full flex items-center justify-center gap-2 bg-white border border-slate-200 hover:border-blue-400 hover:bg-blue-50 text-slate-600 hover:text-blue-600 font-bold py-3 rounded-xl text-xs transition-all duration-200 cursor-pointer">
                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                Tandai Lokasi via Google Maps
                            </button>

                            <div class="flex items-center gap-3 pt-2">
                                <span class="text-xs font-bold text-slate-500">Tandai Sebagai:</span>
                                <label class="flex items-center gap-1.5 cursor-pointer">
                                    <input type="radio" name="address_type" value="Rumah" class="w-4 h-4 text-brand-copper-600 focus:ring-brand-copper-600 border-slate-300" {{ (auth()->check() && auth()->user()->address_type === 'Rumah') || (!auth()->check() && !old('address_type')) || old('address_type') === 'Rumah' ? 'checked' : '' }}>
                                    <span class="text-xs text-slate-600 font-medium">Rumah</span>
                                </label>
                                <label class="flex items-center gap-1.5 cursor-pointer">
                                    <input type="radio" name="address_type" value="Kantor" class="w-4 h-4 text-brand-copper-600 focus:ring-brand-copper-600 border-slate-300" {{ (auth()->check() && auth()->user()->address_type === 'Kantor') || old('address_type') === 'Kantor' ? 'checked' : '' }}>
                                    <span class="text-xs text-slate-600 font-medium">Kantor</span>
                                </label>
                                <label class="flex items-center gap-1.5 cursor-pointer">
                                    <input type="radio" name="address_type" value="Kosan" class="w-4 h-4 text-brand-copper-600 focus:ring-brand-copper-600 border-slate-300" {{ (auth()->check() && auth()->user()->address_type === 'Kosan') || old('address_type') === 'Kosan' ? 'checked' : '' }}>
                                    <span class="text-xs text-slate-600 font-medium">Kosan</span>
                                </label>
                            </div>
                        </div>

                        <h3 class="font-bold text-brand-deep-forest text-sm uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 mt-8">Ringkasan Belanja</h3>
                        
                        <div class="space-y-2 mb-6 text-sm">
                            <div class="flex justify-between text-slate-500">
                                <span>Total Item ({{ count($cart) }})</span>
                                <span class="font-medium text-slate-700">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-slate-500">
                                <span>Metode Kirim</span>
                                <span class="font-bold text-brand-copper-600">Kurir Dapur Sejati</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-6 pt-4 border-t border-slate-100">
                            <span class="font-bold text-brand-deep-forest">Subtotal</span>
                            <span class="font-black text-brand-copper-600 text-xl">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>

                        <!-- 🔒 Mengunci tombol checkout saja jika isi keranjang benar-benar 0 agar mencegah data kosong ter-submit -->
                        <button type="submit" class="w-full flex items-center justify-center gap-2 bg-brand-wood-800 hover:bg-brand-wood-950 text-white font-bold py-3.5 rounded-full text-sm tracking-wider uppercase transition-all duration-300 shadow-md {{ count($cart) == 0 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}" {{ count($cart) == 0 ? 'disabled' : '' }}>
                            Lanjutkan Ke Checkout 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection