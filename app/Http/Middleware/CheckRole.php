<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {

        $user = Auth::user();

        
        
        if($user && array_intersect(explode(',', $user->role), $role)) {
            return $next($request);
        }
    

        abort( 403, 'Acces non autorisé par CEI') ;
    }
}
