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
    public function handle($request, Closure $next, ...$roles)
    {
        /** @var User $user */
        $user = $request->user();

        //check if guest
        if (in_array(UserRole::ROLE_GUEST, $roles) && null === $user) {
            return $next($request);
        }

        //check for other roles
        $roleIds = UserRole::whereIn('role_key', $roles)->get()->pluck('id');

        if (false === $roleIds->isEmpty() && $user && true === $roleIds->contains($user->role_id)) {
            return $next($request);
        }

        abort(403);
    }
}
