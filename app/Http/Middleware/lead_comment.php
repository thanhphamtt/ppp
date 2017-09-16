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
use App\Comment;

class lead_comment
{
    public function handle($request, Closure $next, $guard = null)
    {
        $comment= Comment::find($request->comment_id);
        $userid=\Illuminate\Support\Facades\Auth ::id();
        if($comment->user_id != $userid) return redirect('/post/'.$request->post_id.'/creat_comment');

        return $next($request);

    }
}