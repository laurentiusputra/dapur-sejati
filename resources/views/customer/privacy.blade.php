<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Dapur Sejati</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4ebd0] text-slate-800 min-h-screen font-sans antialiased">
    <section class="py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            
            <!-- Tombol Kembali ke Beranda -->
            <a href="{{ url('/') }}" class="inline-flex items-center text-brand-deep-forest/60 hover:text-brand-deep-forest transition-colors mb-10 text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Home Page
            </a>

            <!-- Header Judul -->
            <div class="mb-10">
                <h1 class="text-3xl sm:text-4xl font-heading font-black text-brand-deep-forest tracking-tight">Kebijakan Privasi.</h1>
                <p class="text-brand-deep-forest/70 mt-2 text-sm sm:text-base">Terakhir diperbarui: Juli 2026</p>
            </div>

            <!-- Konten -->
            <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-slate-100 prose prose-slate max-w-none prose-headings:text-brand-deep-forest prose-a:text-brand-pantone-gold-cream">
                <h3 class="font-bold text-lg mb-3">1. Informasi Otentikasi & Data yang Kami Kumpulkan</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Saat Anda menggunakan layanan Dapur Sejati, kami mengumpulkan informasi identitas pribadi Anda untuk keperluan kelancaran operasional. Informasi ini meliputi data akun yang terikat melalui metode masuk cepat (Google OAuth / Email Terdaftar) berupa nama lengkap, alamat email, serta foto profil (avatar). Kami juga mencatat atribut pendukung manajemen profil pelanggan seperti nomor telepon/WhatsApp, detail wilayah pengiriman (distrik kota, alamat jalan, tipe alamat rumah/kantor/kosan), tanggal lahir, jenis kelamin, serta riwayat keranjang belanja aktif Anda.
                </p>

                <h3 class="font-bold text-lg mb-3">2. Penggunaan Informasi & Integrasi Ulasan Pengguna</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Seluruh informasi yang kami kumpulkan digunakan secara eksklusif untuk memproses transaksi pesanan pre-order, mengelola alokasi produksi makanan, serta mempermudah pengisian formulir. Apabila akun Anda terdeteksi dalam status aktif (terautentikasi), sistem backend kami akan secara otomatis mengunci nama lengkap Anda secara real-time menggunakan atribut enkripsi baca pada halaman Ulasan Pelanggan (Review Page). Hal ini diterapkan demi menjaga keaslian ulasan, transparansi penilaian rasa, dan menghindari manipulasi identitas pembeli fiktif.
                </p>

                <h3 class="font-bold text-lg mb-3">3. Enkripsi Infrastruktur & Keamanan Data Berlapis</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Dapur Sejati berkomitmen penuh menjaga kerahasiaan data pribadi pelanggan. Seluruh kredensial rahasia kata sandi diproteksi menggunakan algoritma enkripsi satu arah (hashing) tingkat tinggi sebelum disimpan ke dalam klaster cloud database terenkripsi (Supabase Infrastructure / S3 Storage). Kami tidak akan membagikan, memindahkan, atau menjual data identitas pribadi Anda kepada pihak ketiga mana pun di luar kebutuhan utama pemrosesan operasional sistem e-commerce ini.
                </p>
                
                <p class="text-sm text-slate-500 italic mt-8 border-t border-slate-100 pt-6">
                    Jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, silakan hubungi kami melalui kontak WhatsApp yang tersedia di bagian bawah situs ini.
                </p>
            </div>
        </div>
    </section>
</body>
</html>