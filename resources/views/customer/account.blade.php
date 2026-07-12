@extends('customer.layouts.app')

@section('title', 'Manajemen Akun')

@section('content')
<!-- 🛠️ UPDATE: pt-[140px] dinaikkan jadi pt-[240px] agar sub-nav dan card turun aman dari jangkauan navbar -->
<div class="min-h-screen bg-[#f4ebd0] pt-[240px] pb-20 px-4 font-sans text-slate-700">
    <div class="max-w-5xl mx-auto">
        
        <!-- Header Sub-Navigasi Atas -->
        <div class="flex justify-between items-center mb-6 text-white px-2">
            <div class="flex items-center gap-3">
                @if(auth()->user()->avatar)
                    <img src="{{ str_starts_with(auth()->user()->avatar, 'http') ? auth()->user()->avatar : Storage::disk('s3')->url(auth()->user()->avatar) }}" class="w-10 h-10 rounded-full object-cover border border-white/20">
                @else
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-sm">👤</div>
                @endif
                <span class="font-bold text-black text-sm tracking-wide">{{ auth()->user()->name }}</span>
            </div>
            
            <!-- 🛠️ UPDATE: Ikon SVG dimasukkan ke dalam tag <a> agar menempel rapat dan presisi dengan teks KEMBALI -->
            <a href="{{ route('home') }}" class="text-xs font-bold text-black tracking-widest uppercase flex items-center gap-1.5 opacity-90 hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>KEMBALI</span>
            </a>
        </div>

        <!-- CONTAINER UTAMA DENGAN SUDUT rounded-3xl -->
        <div class="bg-white rounded-[24px] shadow-2xl overflow-hidden border border-slate-100 min-h-[550px]">
            
            <!-- HEADER TABS NAVIGASI -->
            <div class="flex border-b border-slate-100 bg-slate-50/50">
                <button id="tab-btn-biodata" onclick="switchAccountTab('biodata')" class="px-8 py-4 text-xs font-black uppercase tracking-wider border-b-2 border-[#4a2c11] text-[#4a2c11] transition-all focus:outline-none">
                    Biodata Diri
                </button>
                <!-- 🛠️ [BARU DITAMBAHKAN] Tab Trigger untuk Pesanan & Riwayat -->
                <button id="tab-btn-pesanan" onclick="switchAccountTab('pesanan')" class="px-8 py-4 text-xs font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600 transition-all focus:outline-none">
                    Pesanan & Riwayat
                </button>
                <button id="tab-btn-aktivitas" onclick="switchAccountTab('aktivitas')" class="px-8 py-4 text-xs font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600 transition-all focus:outline-none">
                    Log Aktivitas
                </button>
            </div>

            <div class="p-6 sm:p-10">
                <!-- =========================================================================
                     🃏 TAB 1: BIODATA DIRI (KONTEN FORM & FOTO)
                     ========================================================================= -->
                <div id="account-tab-biodata" class="grid grid-cols-1 md:grid-cols-12 gap-10 items-start">
                    
                    <!-- SISI KIRI: MANAJEMEN FOTO PROFIL -->
                    <div class="md:col-span-4 flex flex-col items-center p-6 bg-slate-50/50 border border-slate-100 rounded-2xl text-center">
                        <div class="relative w-40 h-40 mb-4">
                            @if(auth()->user()->avatar)
                                <img id="profile-preview-img" src="{{ str_starts_with(auth()->user()->avatar, 'http') ? auth()->user()->avatar : Storage::disk('s3')->url(auth()->user()->avatar) }}" class="w-full h-full rounded-2xl object-cover shadow-md border-2 border-slate-200">
                            @else
                                <div class="w-full h-full rounded-2xl bg-[#dfc365]/20 flex items-center justify-center text-4xl shadow-inner">🍳</div>
                            @endif
                        </div>

                        <form action="{{ route('customer.account.update') }}" method="POST" enctype="multipart/form-data" class="w-full space-y-3">
                            @csrf
                            <label class="w-full flex justify-center bg-white border border-slate-200 hover:bg-slate-50 font-bold py-2.5 px-4 rounded-xl text-xs text-slate-700 transition-colors shadow-sm cursor-pointer">
                                <span>Pilih Foto</span>
                                <input type="file" name="avatar" accept="image/*" onchange="this.form.submit()" class="hidden">
                            </label>
                            <p class="text-[9px] text-slate-400 leading-normal">Besar file: maksimum 2.000.000 bytes (2 Megabytes). Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
                        </form>
                    </div>

                    <!-- SISI KANAN: FORM ISIAN DATA LENGKAP -->
                    <div class="md:col-span-8 space-y-8">
                        @if(session('success_profile'))
                            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-xs font-bold shadow-sm">
                                ⚡ {{ session('success_profile') }}
                            </div>
                        @endif

                        <form action="{{ route('customer.account.update') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- KELOMPOK 1: DATA UTAMA -->
                            <div class="space-y-4">
                                <h3 class="text-xs font-black uppercase tracking-wider text-[#4a2c11] border-b border-slate-100 pb-1.5">Ubah Biodata Diri</h3>
                                
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Nama Lengkap</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}" required class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11]">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Nomor Telepon / WA</label>
                                        <input type="text" name="phone" value="{{ auth()->user()->phone }}" placeholder="Contoh: 08123456789" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11]">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" value="{{ auth()->user()->birth_date }}" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11]">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Jenis Kelamin</label>
                                        <select name="gender" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11]">
                                            <option value="Pria" {{ auth()->user()->gender === 'Pria' ? 'selected' : '' }}>Pria</option>
                                            <option value="Wanita" {{ auth()->user()->gender === 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- KELOMPOK 2: ALAMAT PENGIRIMAN DETAIL (SINKRON Halaman Cart) -->
                            <div class="space-y-4 pt-2">
                                <h3 class="text-xs font-black uppercase tracking-wider text-[#4a2c11] border-b border-slate-100 pb-1.5">Alamat Pengiriman Default</h3>
                                
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Provinsi, Kota, Kec, Kode Pos</label>
                                        <input type="text" name="city_district" value="{{ auth()->user()->city_district }}" placeholder="Cth: Jawa Barat, Bekasi" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11]">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Tandai Sebagai</label>
                                        <div class="flex items-center gap-4 h-[46px] px-2">
                                            <label class="flex items-center gap-1.5 text-xs font-bold cursor-pointer">
                                                <input type="radio" name="address_type" value="Rumah" {{ auth()->user()->address_type === 'Rumah' ? 'checked' : '' }} class="text-[#4a2c11] focus:ring-0"> Rumah
                                            </label>
                                            <label class="flex items-center gap-1.5 text-xs font-bold cursor-pointer">
                                                <input type="radio" name="address_type" value="Kantor" {{ auth()->user()->address_type === 'Kantor' ? 'checked' : '' }} class="text-[#4a2c11] focus:ring-0"> Kantor
                                            </label>
                                            <label class="flex items-center gap-1.5 text-xs font-bold cursor-pointer">
                                                <input type="radio" name="address_type" value="Kosan" {{ auth()->user()->address_type === 'Kosan' ? 'checked' : '' }} class="text-[#4a2c11] focus:ring-0"> Kosan
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Nama Jalan, Gedung, No. Rumah</label>
                                    <textarea name="address_line" rows="2" placeholder="Nama jalan, RT/RW, nomor rumah secara jelas..." class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11] resize-none">{{ auth()->user()->address_line }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wide mb-1.5">Detail Lainnya (Blok / Unit / Patokan)</label>
                                    <input type="text" name="address_detail" value="{{ auth()->user()->address_detail }}" placeholder="Cth: Blok C3, Depan Toko Kelontong Merah" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/10 focus:border-[#4a2c11]">
                                </div>
                            </div>

                            <!-- KELOMPOK 3: KEAMANAN -->
                            <div class="space-y-4 pt-2">
                                <h3 class="text-xs font-black uppercase tracking-wider text-[#4a2c11] border-b border-slate-100 pb-1.5">Kontak & Keamanan</h3>
                                <div class="flex items-center justify-between bg-slate-50 p-4 rounded-xl border border-slate-100">
                                    <div>
                                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-wide">Alamat Email Terkait</p>
                                        <p class="text-xs font-bold text-slate-800 mt-0.5">{{ auth()->user()->email }}</p>
                                    </div>
                                    <span class="bg-emerald-100 text-emerald-800 text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-wider">✓ TERVERIFIKASI</span>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-[#4a2c11] hover:bg-[#36200c] text-white font-black py-3.5 rounded-xl text-xs tracking-widest uppercase transition-colors shadow-md">
                                Simpan Perubahan Biodata 💾
                            </button>
                        </form>
                    </div>
                </div>

                <!-- =========================================================================
                     📦 [BARU DITAMBAHKAN] TAB 2: DAFTAR PESANAN & RIWAYAT TRANSAKSI
                     ========================================================================= -->
                <div id="account-tab-pesanan" class="hidden space-y-8">
                    
                    <!-- 1. CARD ATAS: DAFTAR PESANAN PRE-ORDER AKTIF -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 space-y-4">
                        <div class="flex items-center gap-2 border-b border-slate-50 pb-2">
                            <span class="text-sm">🍱</span>
                            <h3 class="text-xs font-black uppercase tracking-wider text-slate-800">Pesanan Aktif (Pre-Order)</h3>
                        </div>
                        
                        <!-- State Masih Kosong -->
                        <div class="py-12 text-center border-2 border-dashed border-slate-100 rounded-2xl flex flex-col items-center justify-center p-6 bg-slate-50/50">
                            <span class="text-3xl mb-2 select-none">⏳</span>
                            <h4 class="text-xs font-bold text-slate-800">Belum Ada Transaksi Aktif</h4>
                            <p class="text-[11px] text-slate-400 mt-1 max-w-[285px] leading-relaxed">Kamu tidak memiliki pesanan katering yang sedang diproses. Ayo pesan menu lezatmu!</p>
                            <a href="{{ route('home') }}#menu" class="bg-[#dfc365] hover:bg-[#4a2c11] text-[#4a2c11] hover:text-white font-black py-2.5 px-6 rounded-full text-[10px] tracking-widest uppercase transition-colors shadow-sm mt-4">
                                Pesan Menu Sekarang 🛒
                            </a>
                        </div>
                    </div>

                    <!-- 2. CARD BAWAH: RIWAYAT PESANAN SELESAI -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 space-y-4">
                        <div class="flex items-center gap-2 border-b border-slate-50 pb-2">
                            <span class="text-sm">📜</span>
                            <h3 class="text-xs font-black uppercase tracking-wider text-slate-800">Riwayat Pesanan</h3>
                        </div>
                        
                        <!-- State Masih Kosong -->
                        <div class="py-12 text-center border-2 border-dashed border-slate-100 rounded-2xl flex flex-col items-center justify-center p-6 bg-slate-50/50">
                            <span class="text-3xl mb-2 select-none">✅</span>
                            <h4 class="text-xs font-bold text-slate-800">Riwayat Belanja Kosong</h4>
                            <p class="text-[11px] text-slate-400 mt-1 max-w-[250px] leading-relaxed">Belum ada catatan transaksi selesai yang terekam di dalam akun Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- =========================================================================
                     ⏰ TAB 3: LOG AKTIVITAS PERANGKAT (TERSEMBUNYI SECARA DEFAULT)
                     ========================================================================= -->
                <div id="account-tab-aktivitas" class="hidden space-y-6">
                    <div>
                        <h3 class="text-sm font-black text-slate-800 tracking-tight">LOG AKTIVITAS & PERANGKAT</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Pantau daftar perangkat yang sedang atau pernah masuk menggunakan akun Dapur Sejati Anda.</p>
                    </div>

                    <div class="border border-slate-100 rounded-2xl overflow-hidden bg-white shadow-sm">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-slate-50/70 border-b border-slate-100 text-[10px] font-black text-slate-400 uppercase tracking-wider">
                                    <th class="p-4">Perangkat / Browser</th>
                                    <th class="p-4">Aktivitas Terakhir</th>
                                    <th class="p-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 font-bold text-slate-700">
                                <tr>
                                    <td class="p-4 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-md">💻</div>
                                        <div>
                                            <p class="font-bold text-slate-900">Chrome di Ubuntu Linux</p>
                                            <p class="text-[10px] text-slate-400 font-medium">Sesi Browser Saat Ini</p>
                                        </div>
                                    </td>
                                    <td class="p-4 text-slate-500">
                                        {{ now()->translatedFormat('d M Y, H.i') }} WIB
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="bg-emerald-100 text-emerald-800 text-[9px] font-black px-3 py-1 rounded-full uppercase">AKTIF</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- 🛠️ UPDATE: JavaScript disesuaikan mendukung pertukaran 3 buah Tab Menu secara mulus -->
<script>
    function switchAccountTab(tabName) {
        const tabBiodata = document.getElementById('account-tab-biodata');
        const tabPesanan = document.getElementById('account-tab-pesanan');
        const tabAktivitas = document.getElementById('account-tab-aktivitas');
        
        const btnBiodata = document.getElementById('tab-btn-biodata');
        const btnPesanan = document.getElementById('tab-btn-pesanan');
        const btnAktivitas = document.getElementById('tab-btn-aktivitas');

        // Sembunyikan semua konten tab terlebih dahulu
        tabBiodata.classList.add('hidden');
        tabPesanan.classList.add('hidden');
        tabAktivitas.classList.add('hidden');
        
        // Kembalikan semua tombol tab ke style tidak aktif
        const inactiveStyle = "px-8 py-4 text-xs font-bold uppercase tracking-wider border-b-2 border-transparent text-slate-400 hover:text-slate-600 transition-all focus:outline-none";
        btnBiodata.className = inactiveStyle;
        btnPesanan.className = inactiveStyle;
        btnAktivitas.className = inactiveStyle;

        // Nyalakan tab & tombol yang dipilih user
        const activeStyle = "px-8 py-4 text-xs font-black uppercase tracking-wider border-b-2 border-[#4a2c11] text-[#4a2c11] transition-all focus:outline-none";
        
        if (tabName === 'biodata') {
            tabBiodata.classList.remove('hidden');
            btnBiodata.className = activeStyle;
        } else if (tabName === 'pesanan') {
            tabPesanan.classList.remove('hidden');
            btnPesanan.className = activeStyle;
        } else if (tabName === 'aktivitas') {
            tabAktivitas.classList.remove('hidden');
            btnAktivitas.className = activeStyle;
        }
    }
</script>
@endsection