<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor)
        {
            return $next($request);
        }

        $flash= '';
        if (Config::get('app.locale') == 'it')
        {
            $flash = 'Attenzione, solo i revisori hanno accesso a questa pagina!';
        } elseif (Config::get('app.locale') == 'en')
        {
            $flash = 'Attention, only reviewers have access to this page!';
        } elseif (Config::get('app.locale') == 'es')
        {
            $flash = 'Atención, ¡sólo los revisores tienen acceso a esta página!';
        }

        return redirect('/')->with('access.denied', $flash);
    }
}
