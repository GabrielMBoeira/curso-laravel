<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsAdminMiddleware

//CRIAR MIDDLEWARE = php artisan make:middleware CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        // if ($user->email != 'lina.block@example.com') {
        //     return redirect('/');
        // }

        return $next($request);
    }
}
