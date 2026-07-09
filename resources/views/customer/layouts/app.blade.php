<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dapur Sejati') | Pre-Order</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-pantone-ruined-smores font-sans antialiased text-slate-800 selection:bg-brand-light selection:text-slate-900">

    <!-- Wrapper luar navbar tetap menjaga posisi floating di atas layar -->
    <div id="nav-wrapper" class="fixed top-0 left-0 right-0 z-50 w-full max-w-full px-0 transition-all duration-500 ease-out">
        
        <!-- Default awal sebelum di-scroll menggunakan max-w-full agar memanjang penuh ke ujung layar -->
        <nav id="main-nav" class="max-w-full mx-auto border-b border-white/10 rounded-none shadow-lg shadow-emerald-950/30 px-6 py-5 flex items-center justify-between transition-all duration-500 ease-out" style="--nav-bg: #064e3b; background-color: var(--nav-bg);">
            <div class="flex items-center gap-3">
                <img id="nav-logo" src="{{ asset('img/logo/logo-dapur-sejati-white.webp') }}" alt="Logo Dapur Sejati" class="h-25 w-25 object-contain transition-all duration-500 ease-out">
                <span class="text-xl font-heading !text-brand-pantone-gold-flake font-bold tracking-wide">Dapur<span class="text-white">&nbsp;Sejati</span></span>
            </div>
            
            <!-- Default awal hover diset abu-abu (hover:!text-slate-300) -->
            <div class="flex items-center gap-6 text-xs sm:text-sm font-bold tracking-wide">
                <a href="{{ route('home') }}" id="nav-home" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Home</a>
                <a href="{{ route('menu') }}" id="nav-menu" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Menu</a>
                <a href="{{ route('review') }}" id="nav-review" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Review</a>
                <a href="{{ route('contact') }}" id="nav-contact" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Contact</a>
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="bg-brand-emerald-bg text-white/85 border-t border-emerald-900/40 py-12">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            <div class="md:col-span-4 flex items-center gap-4">
                <img src="{{ asset('img/logo/logo-dapur-sejati-white.webp') }}" alt="Logo Footer" class="w-35 h-35 object-contain ">
                <div>
                    <h3 class="text-xl font-heading tracking-wide text-brand-light">Dapur Sejati</h3>
                    <p class="text-[11px] text-emerald-100/80 uppercase tracking-widest mt-0.5">Premium Pre-Order</p>
                </div>
            </div>
            <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-6 text-sm">
                <div class="space-y-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">WhatsApp Business</h4>
                    <p class="text-emerald-100/80 hover:text-white transition-colors"><a href="https://wa.me/628174163999" target="_blank">0817-4163-999</a></p>
                </div>
                <div class="space-y-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">Social Media</h4>
                    <p class="text-emerald-100/80 leading-relaxed "> 
                        <a href="https://www.instagram.com/tasteofsejati/" target="_blank" class="hover:text-white transition-colors">Instagram</a> <br>
                    <ul class="space-y-1 text-emerald-100/80">
                        <li><a href="#" class="hover:text-white transition-colors"></a></li>
                        <li><a href="#" class="hover:text-white transition-colors"></a></li>
                    </ul>
                </div>
                <div class="space-y-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">Alamat Dapur</h4>
                    <p class="text-emerald-100/80 leading-relaxed">Jl. Peleburan Tengah No. 12, <br>Semarang Selatan, Kota Semarang</p>
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-6 mt-10 pt-6 border-t border-brand-cream/25 text-center text-[11px] text-emerald-200/40 tracking-wider">
            <p>© 2026 DAPUR SEJATI PO SYSTEM • CRAFTED ELEGANTLY</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById('nav-wrapper');
            const nav = document.getElementById('main-nav');
            const logo = document.getElementById('nav-logo');
            // Mengambil semua elemen link menu di dalam navbar
            const navLinks = nav.querySelectorAll('.nav-link');

            window.addEventListener('scroll', function () {
                if (window.scrollY > 20) {
                    nav.dataset.floating = "true";

                    // 1. Naikkan margin atas wrapper agar kapsul melayang berjarak dari atas window browser
                    wrapper.classList.remove('top-0');
                    wrapper.classList.add('top-4');
                    
                    // 2. Transisi mulus ke Liquid Glass Kapsul (Mengecil presisi mengikuti max-w-5xl)
                    nav.style.backgroundColor = '';
                    nav.classList.remove('rounded-none', 'py-5', 'border-b', 'max-w-full');
                    nav.classList.add('rounded-full', 'py-1', 'border', 'bg-brand-pantone-black-iris/200', 'backdrop-blur-xl', 'border-white/10', 'max-w-5xl');
                    
                    // 3. Perkecil logo
                    logo.classList.remove('h-25', 'w-25');
                    logo.classList.add('h-12', 'w-12');

                    // 4. Ubah warna hover jadi hijau tua pas mode floating biar kontras dengan BG krem terang
                    navLinks.forEach(link => {
                        link.classList.remove('hover:!text-slate-300');
                        link.classList.add('hover:!text-emerald-900');
                    });
                } else {
                    nav.dataset.floating = "false";

                    // Kembalikan posisi wrapper nempel penuh di atas
                    wrapper.classList.add('top-0');
                    wrapper.classList.remove('top-4');
                    
                    // Kembalikan warna solid bawaan tebal DAN balikin lebarnya jadi full lebar layar lagi
                    nav.style.backgroundColor = 'var(--nav-bg)';
                    nav.classList.add('rounded-none', 'py-5', 'border-b', 'max-w-full');
                    nav.classList.remove('rounded-full', 'py-1', 'border', 'bg-brand-pantone-black-iris/200', 'backdrop-blur-xl', 'border-white/10', 'max-w-5xl');
                    
                    // Kembalikan ukuran logo besar asli
                    logo.classList.remove('h-12', 'w-12');
                    logo.classList.add('h-25', 'w-25');

                    // 5. Balikin warna hover ke abu-abu pas navbar kembali ke paling atas (BG Emerald Tua)
                    navLinks.forEach(link => {
                        link.classList.remove('hover:!text-emerald-900');
                        link.classList.add('hover:!text-slate-300');
                    });
                }
            });
        });
    </script>

</body>
</html>