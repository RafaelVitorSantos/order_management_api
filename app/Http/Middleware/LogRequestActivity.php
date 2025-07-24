<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LogRequestActivity
{
    protected int $limit = 10;

    protected array $whitelist = [];

    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        if (in_array($ip, $this->whitelist)) {
            return $next($request);
        }

        $endpoint = $request->path();

        $countKey = "request_count:$ip";
        $logKey = "logged_ip:$ip";

        $count = Cache::increment($countKey);
        if ($count == 1) {
            Cache::put($countKey, 1, now()->addMinutes(1));
        }

        $violationsKey = "violations:$ip";
        $violations = Cache::increment($violationsKey);

        if ($violations === 1) {
            Cache::put($violationsKey, 1, now()->addHour(1));
        }

        if ($violations >= 5 && !Cache::has("alert_sent:$ip")) {
            Cache::put("alert_sent:$ip", true, now()->addHours(1));

            Mail::raw("O IP $ip ultrapassou o limite de requisições 5 vezes na última hora.", function ($message) {
                $message->to("suporte@actiosolucoes.com")
                    ->subject('⚠️ IP suspeito detectado');
            });

            Log::channel('suspect_requests')->alert('IP $ip foi bloqueado 5x por excesso de requisições.');
        }

        if ($count > $this->limit) {
            Log::channel('suspect_requests')->warning(
                "IP $ip excesso de requisições ao $endpoint: $count no último minuto."
            );
            Cache::put($logKey, true, now()->addMinutes(5));

            return response()->json([
                'status' => 'blocked',
                'message' => 'Muitas requisições detectadas. Acesso temporariamente bloqueado.',
            ], 429);
        }

        return $next($request);
    }
}
