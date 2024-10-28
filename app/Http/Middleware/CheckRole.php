<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
         if (Auth::check()) {
        
            $userRoles = $request->user()->getRoleNames()->toArray(); 
            // Cek apakah setidaknya satu peran pengguna sesuai dengan peran yang dibutuhkan
            foreach ($roles as $role) {
                if (in_array($role, $userRoles)) {
                    return $next($request); // Jika ada yang cocok, lanjutkan ke request selanjutnya
                }
            }
        }
        // Jika tidak memiliki peran yang sesuai, arahkan ke halaman lain atau tampilkan pesan
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
