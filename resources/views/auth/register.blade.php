@extends('customer.layouts.app')

@section('title', 'Join Us - Register')

@section('content')
<!-- 🛠️ UPDATE: items-center diganti items-start, dan pt-[140px] dinaikkan jadi pt-[220px] agar form turun sempurna -->
<div class="min-h-screen bg-[#f4ebd0] flex items-start justify-center pt-[220px] pb-20 px-4">
    <div class="bg-white rounded-[32px] p-8 sm:p-10 shadow-2xl w-full max-w-md transform transition-all duration-300">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-black text-[#ca7d5c] tracking-tight">Dapur Sejati</h2>
            <p class="text-slate-700 font-bold text-lg mt-1">Create Account</p>
        </div>

        <form action="{{ url('/register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-[10px] font-black uppercase tracking-wider text-slate-400 mb-1.5">Full Name</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">👤</span>
                    <input type="text" id="name" name="name" required placeholder="Nama Lengkap Anda" 
                           class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/20 focus:border-[#4a2c11] transition-all placeholder:text-slate-300">
                </div>
            </div>

            <div>
                <label for="email" class="block text-[10px] font-black uppercase tracking-wider text-slate-400 mb-1.5">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">✉️</span>
                    <input type="email" id="email" name="email" required placeholder="example@mail.com" 
                           class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/20 focus:border-[#4a2c11] transition-all placeholder:text-slate-300">
                </div>
            </div>

            <div>
                <label for="password" class="block text-[10px] font-black uppercase tracking-wider text-slate-400 mb-1.5">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">🔒</span>
                    <input type="password" id="password" name="password" required placeholder="••••••••" 
                           class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/20 focus:border-[#4a2c11] transition-all placeholder:text-slate-300">
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-[10px] font-black uppercase tracking-wider text-slate-400 mb-1.5">Confirm Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">🛡️</span>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="••••••••" 
                           class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#4a2c11]/20 focus:border-[#4a2c11] transition-all placeholder:text-slate-300">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#4a2c11] hover:bg-[#36200c] text-white font-bold py-3.5 rounded-xl text-sm transition-colors shadow-md tracking-wide mt-4">
                Sign Up
            </button>
        </form>

        <div class="relative flex items-center justify-center my-6">
            <div class="border-t border-slate-100 w-full"></div>
            <span class="absolute bg-white px-3 text-[9px] font-black uppercase tracking-widest text-slate-400">Or Register With</span>
        </div>

        <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold py-3 rounded-xl text-sm transition-colors shadow-sm">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-4 h-4">
            <span>Google Account</span>
        </a>

        <p class="text-center text-xs text-slate-500 mt-8 font-medium">
            Already have an account? <a href="{{ route('login') }}" class="text-[#ca7d5c] hover:underline font-bold">Sign In</a>
        </p>

    </div>
</div>
@endsection