<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockBlacklistIps
{
    protected $blacklisted = [
        //'127.0.0.1',
    ];

    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->ip(), $this->blacklisted)) {
            return response()->json([
                "status" => "blocked",
                "message" => 'IP bloqueado.'
            ], 403);
        }
        return $next($request);
    }
}
