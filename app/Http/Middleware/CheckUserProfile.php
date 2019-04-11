<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->profile) {
            return redirect()->route('profiles.create')
                ->with('status', 'Estimado usuario, debe completar su información de perfil para continuar.');
        }

        return $next($request);
    }
}
