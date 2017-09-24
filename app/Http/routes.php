<?php

use App\Task;
use Illuminate\Http\Request;


Route::group(['domain' => "api." .config("app.domain")], function () {
    Route::post('/register-user', 'RegisterController@reg');
    Route::post('/login-user', 'LoginController@log');

});
Route::group(['domain' => "api." .config("app.domain"), 'middleware' => ['jwt.auth']], function () {
    Route::post('upload','UploadImageController@upload');
    Route::post('/upload/{img_id}','ImgCommentController@upComment');
    Route::get('/imgC-data', 'ImgCommentController@displayComment');
    Route::get('/page', 'UploadImageController@display');
    Route::get('/search-user', 'LoginController@searchuser');
    Route::post('/like/{img_id}/{user_id}','UploadImageController@likeUnlike');
    Route::post('/editprofile/{userid}','LoginController@editprofile');
    Route::get('/profile/{userid}','LoginController@profile');
});
// Route::get(['domain'=>"api.".config('app.domain'),'middleware' => ['jwt.auth']],'LoginController@searchuser');



//Route::get('/','PostController@index')->middleware('logined');
//Route::post('/post','PostController@store')->middleware('logined');
//Route::delete('/post/{post_id}','PostController@deletePost')->middleware('lead_post');
//Route::get('/post/{post_id}','PostController@postDetail')->middleware('lead_post');
//Route::post('/post/{post_id}','PostController@editPost')->middleware('lead_post');
//
//Route::get('/post/{post_id}/creat_comment','CommentController@index')->middleware('logined');
//Route::post('/post/{post_id}/comment','CommentController@storeComment')->middleware('logined');
//Route::delete('/post/{post_id}/comment/{comment_id}','CommentController@deleteComment')->middleware('lead_comment_post');
//Route::get('/post/{post_id}/comment/{comment_id}','CommentController@commentDetail')->middleware('lead_comment');
//Route::post('/post/{post_id}/comment/{comment_id}','CommentController@editComment')->middleware('lead_comment');
//Route::auth();