<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        if (auth()->check()) {
            if (auth()->user()->user_type == 'admin') {
                return redirect('admin/dashboard');
            }
            if (auth()->user()->user_type == 'customer') {
                return redirect('customer/dashboard');  // Customer home page
            }
            if (auth()->user()->user_type == 'outlet_manager') {
                return redirect('outlet/dashboard');  // Employee dashboard
            }
            if (auth()->user()->user_type == 'business') {
                return redirect('business/dashboard');  // Employee dashboard
            }
            return redirect('/home');
        }
        return $next($request);
    }
}
