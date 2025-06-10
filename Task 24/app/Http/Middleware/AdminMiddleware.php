<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Cek apakah pengguna terautentifikasi jadi role 'admin' atau tidak
        if(Auth::check() && Auth::user()->role == 'admin')
        {
            return $next($request);
        }

        //Jika tidak, maka redirect ke halama lain
        //return redirect('/home')->with('error', 'Anda tidak dapat akses masuk jadi Admin');
        return abort(403);
    }
}
