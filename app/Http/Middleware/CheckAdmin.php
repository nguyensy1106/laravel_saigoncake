<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::id();
        $user = User::find($id);
        if ($user->role != 1) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
