<?php

namespace App\Http\Middleware;

use Closure;

class Decentralization
{
    /**
     * check phân quyền (admin)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if($request->path() === 'account'){
            $user = $request->user();
            if($user && !$user->isAdmin){
                return redirect('account/profile/'.$user->id.'?isAdmin=false');
            }
        }
        return $next($request);
    }
}
