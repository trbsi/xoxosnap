<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserRole;
use Closure;

class RoleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $role = UserRole::where('role_key', $role)->first();

        /** @var User $user */
        $user = $request->user();
        if ($role && $user && $role->id === $user->role_id) {
            return $next($request);
        }

        abort(403);
    }
}
