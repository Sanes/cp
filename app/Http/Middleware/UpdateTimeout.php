<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UpdateTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Carbon\Carbon::now()->subMinutes(15) > $request->route('ticket')->updated_at) {
            abort(403);
        }
        
        return $next($request);
    }
}
