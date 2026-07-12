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
                
                <!-- 🛠️ UPDATE: Menambahkan anchor #menu agar otomatis meluncur ke bawah melewati banner hero -->
                <a href="{{ route('menu') }}" id="nav-menu" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Menu</a>
                
                <a href="{{ route('review') }}" id="nav-review" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Review</a>
                <a href="{{ route('contact') }}" id="nav-contact" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 pb-0.5 transition-all duration-200">Contact</a>
                
                <div id="nav-divider" class="h-4 w-[1px] bg-white/20 allocation-border transition-colors duration-300"></div>

                <a href="{{ route('cart.index') }}" id="nav-cart" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 transition-all duration-200 relative" aria-label="Keranjang Belanja">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    
                    @if(session('cart'))
                        <span class="absolute -top-1.5 -right-1.5 bg-red-500 text-white text-[9px] font-bold w-4 h-4 flex items-center justify-center rounded-full">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                <!-- =========================================================================
                     👤 SISTEM DETEKSI AUTENTIKASI AKUN DINAMIS (GUEST VS DROPDOWN PROFILE)
                     ========================================================================= -->
                @auth
                    <!-- Wrapper drop menu posisi relative -->
                    <div class="relative inline-block text-left select-none" id="profile-dropdown-wrapper">
                        <button id="profile-menu-button" class="nav-link flex items-center focus:outline-none transition-all duration-200" aria-label="Buka Menu Akun">
                            @if(auth()->user()->avatar)
                                <img src="{{ str_starts_with(auth()->user()->avatar, 'http') ? auth()->user()->avatar : Storage::disk('s3')->url(auth()->user()->avatar) }}" 
                                     alt="PP" 
                                     class="w-6 h-6 sm:w-7 sm:h-7 rounded-full object-cover border border-[#dfc365] shadow-sm hover:scale-105 transition-transform duration-200 cursor-pointer">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6 text-brand-pantone-gold-flake cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            @endif
                        </button>

                        <!-- CARD POP-UP DROPDOWN PROFILE -->
                        <div id="profile-dropdown-menu" class="hidden absolute right-0 mt-3 w-64 bg-white rounded-[24px] shadow-2xl border border-slate-100 overflow-hidden z-50 transform transition-all duration-300 origin-top-right">
                            
                            <!-- Header Info User -->
                            <div class="p-4 flex items-center gap-3 border-b border-slate-100 bg-amber-50/20">
                                @if(auth()->user()->avatar)
                                    <img src="{{ str_starts_with(auth()->user()->avatar, 'http') ? auth()->user()->avatar : Storage::disk('s3')->url(auth()->user()->avatar) }}" 
                                         alt="Profile" 
                                         class="w-10 h-10 rounded-full object-cover border border-[#dfc365]">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-[#dfc365]/20 flex items-center justify-center text-md">🍳</div>
                                @endif
                                <div class="overflow-hidden">
                                    <h4 class="text-xs font-black text-slate-800 truncate leading-tight">{{ auth()->user()->name }}</h4>
                                    <p class="text-[10px] text-slate-400 font-medium truncate mt-0.5">{{ auth()->user()->email }}</p>
                                </div>
                            </div>

                            <!-- Baris List Tautan Menu -->
                            <div class="py-1 text-[11px] font-bold text-slate-600">
                                <a href="{{ route('customer.account') }}" class="flex items-center justify-between px-4 py-3 hover:bg-slate-50 transition-colors">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-sm opacity-80">💼</span>
                                        <span>Daftar Pembelian</span>
                                    </div>
                                    <span class="text-slate-300 text-[9px]">❯</span>
                                </a>
                                <a href="{{ route('home') }}#menu" class="flex items-center justify-between px-4 py-3 hover:bg-slate-50 transition-colors">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-sm opacity-80">❤️</span>
                                        <span>Favourite Menu</span>
                                    </div>
                                    <span class="text-slate-300 text-[9px]">❯</span>
                                </a>
                                <a href="{{ route('customer.account') }}" class="flex items-center justify-between px-4 py-3 hover:bg-slate-50 transition-colors">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-sm opacity-80">⚙️</span>
                                        <span>Pengaturan Akun</span>
                                    </div>
                                    <span class="text-slate-300 text-[9px]">❯</span>
                                </a>
                            </div>

                            <!-- Tombol Keluar Akun (POST Secure Logout) -->
                            <div class="border-t border-slate-50 bg-slate-50/50">
                                <form action="{{ route('logout') }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-3 text-[11px] font-black text-rose-600 hover:bg-rose-50 transition-colors text-left">
                                        <span class="text-sm">🚪</span>
                                        <span>Keluar Akun</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" id="nav-login-btn" class="nav-link !text-brand-pantone-gold-flake hover:!text-slate-300 transition-all duration-200" aria-label="Login Management">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                @endauth
            </div>
        </nav>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="bg-brand-emerald-bg text-white/85 border-t border-emerald-900/40 py-12">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-10 items-start">
            <div class="md:col-span-4 flex items-center gap-4">
                <img src="{{ asset('img/logo/logo-dapur-sejati-white.webp') }}" alt="Logo Footer" class="w-35 h-35 object-contain ">
                <div>
                    <h3 class="text-xl font-heading tracking-wide text-brand-light">Dapur Sejati</h3>
                    <p class="text-[11px] text-emerald-100/80 uppercase tracking-widest mt-0.5">Premium Pre-Order</p>
                </div>
            </div>
            
            <div class="md:col-span-8 flex flex-col sm:flex-row flex-wrap justify-between gap-8 text-sm">
                
                <div class="space-y-3 min-w-max">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">WhatsApp Business</h4>
                    <p><a href="https://wa.me/628174163999" target="_blank" class="text-emerald-100/80 hover:text-white transition-colors">0817-4163-999</a></p>
                </div>
                
                <div class="space-y-3 min-w-max">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">Social Media</h4>
                    <ul class="space-y-1 text-emerald-100/80">
                        <li><a href="https://www.instagram.com/tasteofsejati/" target="_blank" class="hover:text-white transition-colors">@tasteofsejati</a></li>
                    </ul>
                </div>
                
                <div class="space-y-3 max-w-[240px]">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">Alamat Dapur</h4>
                    <p class="text-emerald-100/80 leading-relaxed">Jl. Peleburan Tengah No. 12,<br>Semarang Selatan, Kota Semarang</p>
                </div>
                
                <div class="space-y-3 min-w-max">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-brand-light">Privacy Policy and Terms of Service</h4>
                    <ul class="space-y-1 text-emerald-100/80">
                        <li><a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a></li>
                    </ul>
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

            const profileBtn = document.getElementById('profile-menu-button');
            const profileDropdown = document.getElementById('profile-dropdown-menu');

            if (profileBtn && profileDropdown) {
                profileBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    profileDropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', function (e) {
                    if (!profileDropdown.classList.contains('hidden') && !profileDropdown.contains(e.target) && e.target !== profileBtn) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            }

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
                        link.classList.remove('hover:!text-emerald-700');
                        link.classList.add('hover:!text-slate-300');
                    });
                }
            }

            function checkBackgroundContrast() {
                if (!isFloatingMode) return;

                wrapper.style.pointerEvents = 'none'; 

                const rect = nav.getBoundingClientRect();
                const y = rect.top + (rect.height / 2);
                
                const xPoints = [
                    window.innerWidth * 0.15, 
                    window.innerWidth * 0.50, 
                    window.innerWidth * 0.85  
                ];

                let lightScore = 0;
                let darkScore = 0;

                xPoints.forEach(x => {
                    const elementsUnderPoint = document.elementsFromPoint(x, y);
                    let pointIsLight = true; 

                    for (let el of elementsUnderPoint) {
                        if (el.id === 'nav-wrapper' || el.id === 'main-nav') continue;

                        if (el.tagName === 'IMG' || el.tagName === 'SVG') {
                            pointIsLight = false;
                            break;
                        }

                        const bg = window.getComputedStyle(el).backgroundColor;
                        const rgba = bg.match(/\d+(\.\d+)?/g);
                        
                        if (rgba && rgba.length >= 3) {
                            const alpha = rgba.length === 4 ? parseFloat(rgba[3]) : 1;
                            
                            if (alpha > 0.1) {
                                const r = parseInt(rgba[0]);
                                const g = parseInt(rgba[1]);
                                const b = parseInt(rgba[2]);
                                const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                                
                                pointIsLight = brightness > 150;
                                break; 
                            }
                        }
                    }
                    
                    if (pointIsLight) lightScore++;
                    else darkScore++;
                });

                wrapper.style.pointerEvents = 'auto'; 

                const newTheme = (lightScore > darkScore) ? 'light' : 'dark';
                
                if (currentTheme !== newTheme) {
                    currentTheme = newTheme;
                    applyNavbarTheme(newTheme);
                }
            }

            let scrollTimeout = null;
            
            window.addEventListener('scroll', function () {
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

            const sections = document.querySelectorAll('section[id]');
            const navLinks2 = document.querySelectorAll('.nav-link');

            window.addEventListener('scroll', () => {
                let currentSectionId = 'home';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.pageYOffset >= (sectionTop - 140)) {
                        currentSectionId = section.getAttribute('id');
                    }
                });

                navLinks2.forEach(link => {
                    link.classList.remove('text-brand-light', 'border-b-2', 'border-brand-light');
                    if (!isFloatingMode) link.classList.add('text-white/80');
                    
                    if (link.getAttribute('href') === `#${currentSectionId}`) {
                        if (!isFloatingMode) link.classList.remove('text-white/80');
                        link.classList.add('text-brand-light', 'border-b-2', 'border-brand-light');
                    }
                });
            });
        });
    </script>

    <!-- 🛠️ UPDATE WIDGET GLOBAL: Smooth Toast Notification Alert Slide-in -->
    @if(session('success'))
        <div id="custom-toast-alert" 
             class="fixed top-28 right-6 z-50 transform translate-x-full opacity-0 transition-all duration-500 ease-out max-w-sm bg-emerald-50 border border-emerald-400 text-emerald-950 px-5 py-3.5 rounded-2xl shadow-xl flex items-center gap-3 backdrop-blur-md bg-opacity-95">
            
            <div class="flex items-center justify-center w-7 h-7 rounded-full bg-emerald-500 text-white shrink-0 text-sm shadow-sm animate-bounce">
                ✨
            </div>
            
            <div class="text-xs font-black tracking-wide leading-relaxed pr-2">
                {{ session('success') }}
            </div>
            
            <button type="button" onclick="dismissToastAlert()" class="ml-auto text-slate-400 hover:text-rose-600 text-base font-bold transition-colors focus:outline-none cursor-pointer">
                &times;
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toastElement = document.getElementById('custom-toast-alert');
                if (toastElement) {
                    setTimeout(() => {
                        toastElement.classList.remove('translate-x-full', 'opacity-0');
                        toastElement.classList.add('translate-x-0', 'opacity-100');
                    }, 150);

                    setTimeout(() => {
                        dismissToastAlert();
                    }, 4000);
                }
            });

            function dismissToastAlert() {
                const toastElement = document.getElementById('custom-toast-alert');
                if (toastElement) {
                    toastElement.classList.remove('translate-x-0', 'opacity-100');
                    toastElement.classList.add('translate-x-full', 'opacity-0');
                    setTimeout(() => {
                        toastElement.remove();
                    }, 550);
                }
            }
        </script>
    @endif

</body>
</html>