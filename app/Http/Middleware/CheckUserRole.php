<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;
use Illuminate\Support\Facades\Gate;

class CheckUserRole
{
    /**
     * check role cua user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        $a = new User();
        $a->hasRole($role);
        if (!$request->user()->hasRole($role)) {
            abort(404);
        }

        Gate::allows($permission);
        // if ($permission !== null && !$request->user()->can($permission)) {
        //     abort(404);
        // }

        return $next($request);
    }
}
