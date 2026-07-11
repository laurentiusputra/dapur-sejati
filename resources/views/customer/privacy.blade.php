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
                <h3 class="font-bold text-lg mb-3">1. Informasi yang Kami Kumpulkan</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Saat Anda menggunakan layanan Dapur Sejati, baik melalui website untuk pemesanan Pre-Order atau layanan katering, kami mungkin meminta informasi identitas pribadi Anda, seperti nama lengkap, nomor WhatsApp, alamat pengiriman, dan riwayat pesanan (termasuk interaksi ulasan yang terhubung dengan akun Google Anda jika fitur tersebut diaktifkan).
                </p>

                <h3 class="font-bold text-lg mb-3">2. Penggunaan Informasi</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Informasi yang kami kumpulkan digunakan secara eksklusif untuk memproses pesanan Anda, mengatur pengiriman, dan mengomunikasikan detail penting mengenai produk atau sistem *batch* kami. Ulasan yang Anda berikan mungkin ditampilkan secara publik di beranda kami untuk keperluan transparansi kualitas layanan.
                </p>

                <h3 class="font-bold text-lg mb-3">3. Keamanan Data</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Dapur Sejati menghargai privasi Anda dan berkomitmen menjaga kerahasiaan data pribadi pelanggan kami. Kami tidak akan menjual atau membagikan data identitas pribadi Anda kepada pihak ketiga mana pun tanpa persetujuan Anda, kecuali jika diwajibkan oleh hukum yang berlaku.
                </p>
                
                <p class="text-sm text-slate-500 italic mt-8 border-t border-slate-100 pt-6">
                    Jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, silakan hubungi kami melalui kontak WhatsApp yang tersedia di bagian bawah situs ini.
                </p>
            </div>
        </div>
    </section>
</body>
</html>