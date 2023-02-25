<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class MaintenanceMode 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // dd(Storage::disk('framework')->exists('maintenance'));
<<<<<<< HEAD
        if (Storage::disk('framework')->exists('maintenance') && !$request->is('dashboard*')) {
=======
        if (Storage::disk('framework')->exists('maintenance') && $request->is('/') && $request->is('page*') && $request->is('post*')&& $request->is('comment*')) {
>>>>>>> dc90199365855f1f7bba72eb32907cdc42c7ed24
            return response()->view('components.maintenance', [], 500);
        }

        return $next($request);
    }
}
