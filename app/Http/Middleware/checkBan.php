<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ban = $request->user()->is_banned;

        if ((boolean) $ban) {

            return response()->json(['message' => 'You are currently banned']);
        }
        
        return $next($request);
    }
}
