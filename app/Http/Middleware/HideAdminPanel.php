<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HideAdminPanel
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 🔒 STEALTH CONDITION: Jika belum login, sembunyikan dashboard & tendang langsung ke home page
        if (!auth()->check()) {
            return redirect('/'); 
            
            // 💡 TIPS: Kalau mau bener-bener dikira rute /superadmin ini tidak ada di websitemu,
            // kamu bisa ganti baris redirect di atas dengan: abort(404);
        }

        return $next($request);
    }
}