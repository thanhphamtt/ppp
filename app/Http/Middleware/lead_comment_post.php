<?php
/**
 * Created by PhpStorm.
 * User: tt
 * Date: 08/09/2017
 * Time: 20:58
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;

class lead_comment_post
{
    public function handle($request, Closure $next, $guard = null)
    {
        $comment= Comment::find($request->comment_id);
        $post= Post::find($request->post_id);
        $userid=\Illuminate\Support\Facades\Auth ::id();
        if($comment->user_id != $userid && $post->user_id != $userid ) return redirect('/post/'.$request->post_id.'/creat_comment');

        return $next($request);

    }
}