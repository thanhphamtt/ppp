<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Auth;
class CommentController extends Controller
{
    //
    public function index($post_id){
        $comments = Comment::orderBy('created_at', 'asc')->get();
        $post= Post:: find($post_id);
        $userid=\Illuminate\Support\Facades\Auth ::id();
        return view('creatComment', [
            'comments' => $comments,
            'userid'=>$userid,
            'post_id'=>$post_id,
            'post'=>$post,
        ]);

    }
    public function storeComment($post_id,Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/post/'.$post_id.'/creat_comment')
                ->withInput()
                ->withErrors($validator);
        }

        $comment = new Comment;
        $comment->content=$request->description;
        $comment->user_id=(int)$request->user_id;
        $comment->post_id=(int)$request->post_id;
        $comment->save();
        return redirect('/post/'.$post_id.'/creat_comment');
    }
    public function deleteComment($post_id,$comment_id,Request $request){
        $comment= Comment::find($comment_id);
        $comment->delete();
        return redirect('/post/'.$post_id.'/creat_comment');
    }
    public function editComment($post_id,$comment_id,Request $request){
        $comment = Comment::find($comment_id);
        $comment->content=$request->description;
        $comment->user_id=$request->user_id;
        $comment->save();
        return redirect('/post/'.$post_id.'/creat_comment');

    }
    public function commentDetail($post_id,$comment_id){
        $comment = Comment::find($comment_id);

        return view('commentdetail',[
            "comment"=> $comment,
            "post_id"=>$post_id,

        ]);
    }
}
