<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Teacher;

class KeyTeacher {
    public function handle(Request $request, Closure $next): Response {
        $user = auth()->user();
        if (!$user instanceof Teacher) {
            return response()->json(['message' => 'Вам доступ запрещен.'], 403);
        }
        return $next($request);
    }
}
