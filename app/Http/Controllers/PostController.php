<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Auth;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::orderBy('created_at', 'asc')->get();
        $userid=\Illuminate\Support\Facades\Auth ::id();
        return view('posts', [
            'posts' => $posts,
            'userid'=>$userid,
        ]);

    }
    public function store(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|max:5',
            'description' => 'required|max:10',
            'image_url'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $post = new Post;
        $post->title=$request->title;
        $post->content=$request->description;
        $post->image_url=$request->image_url;
        $post->user_id=(int)$request->user_id;
        $post->save();
        return redirect('/');
    }
    public function deletePost($post_id,Request $request){
        $post= Post::find($post_id);
        $post->delete();
        $comment= Comment::find($post_id);
        if(count($comment)>0)   $comment->delete();
        return redirect('/');
    }
    public function editPost($post_id,Request $request){
        $post = Post::find($post_id);
        $post->title=$request->title;
        $post->content=$request->description;
        $post->image_url=$request->image_url;
        $post->user_id=$request->user_id;
        $post->save();
        return redirect('/');

    }
    public function postDetail($post_id){
        $post = Post::find($post_id);
        return view('postdetail',[
            "post"=> $post
        ]);
    }
    public function ppp(){
        return [
          "message" => "hello"
        ];
    }
}
