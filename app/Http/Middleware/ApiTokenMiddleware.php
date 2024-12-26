<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $authorization = $request->header('Authorization');

        if (!$authorization || !str_starts_with($authorization, 'Bearer ')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }


        $plainToken = substr($authorization, 7);
        $tokenHash =hash('sha256',$plainToken);

        $token = ApiToken::where('token_hash', $tokenHash)->first();

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if ($token->revoked) {
            return response()->json(['message' => 'Token revoked'], 401);
        }

        if ($token->expires_at && Carbon::now()->greaterThan($token->expires_at)) {
            return response()->json(['message' => 'Token expired'], 401);
        }

        return $next($request);
    }
}
