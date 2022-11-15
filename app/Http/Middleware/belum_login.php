<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('id_user')) {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with('pesan', 'selamat datang ' . Str::upper(session('nama_lengkap')));
        }
    }
}
