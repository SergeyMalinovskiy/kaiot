<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use http\Env\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::check())
        {
            return redirect(route('login', [ 'backUri' => $request->getRequestUri() ]));
        }

        return $next($request);
    }
}
