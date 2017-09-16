<?php
/**
 * Created by PhpStorm.
 * User: tt
 * Date: 03/09/2017
 * Time: 11:02
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Logined
{
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(Auth::guard($guard)->check());
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }
        return $next($request);

    }
}