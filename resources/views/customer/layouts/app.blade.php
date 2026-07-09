<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dapur Sejati') | Pre-Order</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-pantone-ruined-smores font-sans antialiased text-slate-800 selection:bg-brand-light selection:text-slate-900">

    <div id="nav-wrapper" class="fixed top-0 left-0 right-0 z-50 w-full max-w-full px-0 transition-all duration-500 ease-out">
        
        <nav id="main-nav" class="max-w-full mx-auto border-b border-white/10 rounded-none shadow-lg shadow-emerald-950/30 px-6 py-5 flex items-center justify-between transition-all duration-500 ease-out" style="--nav-bg: #064e3b; background-color: var(--nav-bg);">
            <div class="flex items-center gap-3">
                <img id="nav-logo" src="{{ asset('img/logo/logo-dapur-sejati-white.webp') }}" alt="Logo Dapur Sejati" class="h-25 w-25 object-contain transition-all duration-500 ease-out">
                <span id="nav-brand-text" class="text-xl font-heading !text-brand-pantone-gold-flake font-bold tracking-wide transition-colors duration-300">Dapur<span class="text-white transition-colors duration-300" id="nav-brand-subtext">&nbsp;Sejati</span></span>
            </div>
            
            <div class="flex items-center gap-6 text-xs sm:text-sm font-bold tracking-wide">
                <a href="{{ route('home') }}" id="nav-home" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Home</a>
                <a href="{{ route('menu') }}" id="nav-menu" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Menu</a>
                <a href="{{ route('review') }}" id="nav-review" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Review</a>
                <a href="{{ route('contact') }}" id="nav-contact" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Contact</a>
                
                <div id="nav-divider" class="h-4 w-[1px] bg-white/20 allocation-border transition-colors duration-300"></div>

                <a href="#" id="nav-cart" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 transition-all duration-200 relative" aria-label="Keranjang Belanja">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>

                <a href="{{ route('login') }}" id="nav-login-btn" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 transition-all duration-200" aria-label="Login Management">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </a>
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
            const brandText = document.getElementById('nav-brand-text');
            const brandSubtext = document.getElementById('nav-brand-subtext');
            const divider = document.getElementById('nav-divider');
            const navLinks = nav.querySelectorAll('.nav-link');

            let isFloatingMode = false;
            let currentTheme = 'dark'; 

            function applyNavbarTheme(theme) {
                if (!isFloatingMode) return; 

                if (theme === 'light') {
                    brandText.style.setProperty('color', '#064e3b', 'important');
                    brandSubtext.style.setProperty('color', '#064e3b', 'important');
                    divider.style.backgroundColor = 'rgba(6, 78, 59, 0.2)';

                    navLinks.forEach(link => {
                        link.style.setProperty('color', '#064e3b', 'important');
                        link.classList.remove('hover:!text-slate-300');
                        link.classList.add('hover:!text-emerald-700');
                    });
                } else {
                    brandText.style.setProperty('color', '', '');
                    brandSubtext.style.setProperty('color', '', '');
                    divider.style.backgroundColor = '';

                    navLinks.forEach(link => {
                        link.style.setProperty('color', '', '');
                        link.classList.remove('hover:!text-emerald-200');
                        link.classList.add('hover:!text-emerald-600');
                    });
                }
            }

            function checkBackgroundContrast() {
                if (!isFloatingMode) return;

                wrapper.style.pointerEvents = 'none'; 

                const rect = nav.getBoundingClientRect();
                const y = rect.top + (rect.height / 2);
                
                // Sensor 3 Titik
                const xPoints = [
                    window.innerWidth * 0.15, 
                    window.innerWidth * 0.50, 
                    window.innerWidth * 0.85  
                ];

                let lightScore = 0;
                let darkScore = 0;

                xPoints.forEach(x => {
                    // Gunakan elementsFromPoint (Jamak) untuk X-Ray seketika seluruh tumpukan elemen
                    const elementsUnderPoint = document.elementsFromPoint(x, y);
                    let pointIsLight = true; // Default asumsi latar belakang krem

                    for (let el of elementsUnderPoint) {
                        // Abaikan navbar itu sendiri jika ikut terdeteksi
                        if (el.id === 'nav-wrapper' || el.id === 'main-nav') continue;

                        // Jika nabrak gambar makanan/SVG, wajib pakai teks terang (Dark Theme Navbar)
                        if (el.tagName === 'IMG' || el.tagName === 'SVG') {
                            pointIsLight = true; // Asumsi gambar itu gelap, jadi navbar harus terang
                            break;
                        
                        // Jika nabrak warna widget solid (misal div, section, atau background), cek kecerahan warnanya
                        } else if (el.tagName === 'DIV' || el.tagName === 'SECTION' || el.tagName === 'MAIN' || el.tagName === 'ARTICLE') {
                            const bg = window.getComputedStyle(el).backgroundColor;
                            const rgba = bg.match(/\d+(\.\d+)?/g);
                            
                            if (rgba && rgba.length >= 3) {
                                const alpha = rgba.length === 4 ? parseFloat(rgba[3]) : 1;
                                
                                // Jika elemen punya warna solid (bukan transparan)
                                if (alpha > 0.1) {
                                    const r = parseInt(rgba[0]);
                                    const g = parseInt(rgba[1]);
                                    const b = parseInt(rgba[2]);
                                    const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                                    
                                    // Cek apakah warnanya cerah
                                    pointIsLight = brightness > 200;
                                    break; // Stop ngecek ke bawah lagi karena udah nemu layar solid teratas!
                                }
                            }
                        }

                        // Deteksi warna asli dengan cepat tanpa loop DOM parent
                        const bg = window.getComputedStyle(el).backgroundColor;
                        const rgba = bg.match(/\d+(\.\d+)?/g);
                        
                        if (rgba && rgba.length >= 3) {
                            const alpha = rgba.length === 4 ? parseFloat(rgba[3]) : 1;
                            
                            // Jika elemen punya warna solid (bukan transparan)
                            if (alpha > 0.1) {
                                const r = parseInt(rgba[0]);
                                const g = parseInt(rgba[1]);
                                const b = parseInt(rgba[2]);
                                const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                                
                                // Cek apakah warnanya cerah
                                pointIsLight = brightness > 200;
                                break; // Stop ngecek ke bawah lagi karena udah nemu layar solid teratas!
                            }
                        }
                    }
                    
                    if (pointIsLight) lightScore++;
                    else darkScore++;
                });

                wrapper.style.pointerEvents = 'auto'; 

                // Tentukan pemenang
                const newTheme = (lightScore > darkScore) ? 'light' : 'dark';
                
                if (currentTheme !== newTheme) {
                    currentTheme = newTheme;
                    applyNavbarTheme(newTheme);
                }
            }

            let scrollTimeout = null;
            
            window.addEventListener('scroll', function () {
                // Logika pembentukan pil navbar tetap dieksekusi instan tanpa delay
                if (window.scrollY > 20) {
                    if (!isFloatingMode) {
                        isFloatingMode = true;
                        nav.dataset.floating = "true";

                        wrapper.classList.remove('top-0');
                        wrapper.classList.add('top-4');
                        
                        nav.style.backgroundColor = '';
                        nav.classList.remove('rounded-none', 'py-5', 'border-b', 'max-w-full');
                        nav.classList.add('rounded-full', 'py-1', 'border', 'bg-brand-pantone-black-iris/200', 'backdrop-blur-xl', 'border-white/10', 'max-w-5xl');
                        
                        logo.classList.remove('h-25', 'w-25');
                        logo.classList.add('h-12', 'w-12');
                    }
                    
                    // Logika X-Ray Warna DIBATASI (Throttled) jadi 50ms agar tidak bikin lag/CPU jebol
                    if (!scrollTimeout) {
                        scrollTimeout = setTimeout(() => {
                            checkBackgroundContrast();
                            scrollTimeout = null;
                        }, 50);
                    }

                } else {
                    if (isFloatingMode) {
                        isFloatingMode = false;
                        nav.dataset.floating = "false";
                        currentTheme = 'dark'; 

                        wrapper.classList.add('top-0');
                        wrapper.classList.remove('top-4');
                        
                        nav.style.backgroundColor = 'var(--nav-bg)';
                        nav.classList.add('rounded-none', 'py-5', 'border-b', 'max-w-full');
                        nav.classList.remove('rounded-full', 'py-1', 'border', 'bg-brand-pantone-black-iris/200', 'backdrop-blur-xl', 'border-white/10', 'max-w-5xl');
                        
                        logo.classList.remove('h-12', 'w-12');
                        logo.classList.add('h-25', 'w-25');

                        brandText.style.color = '';
                        brandSubtext.style.color = '';
                        divider.style.backgroundColor = '';
                        
                        navLinks.forEach(link => {
                            link.style.color = '';
                            link.classList.remove('hover:!text-emerald-900', 'hover:!text-emerald-700');
                            link.classList.add('hover:!text-slate-300');
                        });
                    }
                }
            });
        });
    </script>

</body>
</html>