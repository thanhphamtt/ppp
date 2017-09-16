<?php
/**
 * Created by PhpStorm.
 * User: tt
 * Date: 08/09/2017
 * Time: 16:03
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Post;

class lead_post
{
    public function handle($request, Closure $next, $guard = null)
    {
        $post= Post::find($request->post_id);
        $userid=\Illuminate\Support\Facades\Auth ::id();
        //echo($userid);
        if($post->user_id != $userid) return redirect('/login');

        return $next($request);

    }
}