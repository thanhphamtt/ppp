<?php

use App\Task;
use Illuminate\Http\Request;

//Route::get('/', 'CourseController@courses');
//Route::post('/course','CourseController@store');
//Route::delete('/course/{course_id}', 'CourseController@deleteCourse');
//Route::post('/course/{course_id}', 'CourseController@editCourse');
//Route::get('/course/{course_id}','CourseController@simpleDetail');
//Route::get('/course/{course_id}/creat_class','ClassController@creatClass')->middleware('logined');
//Route::post('/course/{course_id}/class','ClassController@storeClass');
//Route::delete('/course/{course_id}/class/{class_id}','ClassController@deleteClass');
//Route::auth();
//
//Route::get('/home', 'HomeController@index');

Route::get('/','PostController@index')->middleware('logined');
Route::get('/ppp','PostController@ppp');
Route::post('/post','PostController@store')->middleware('logined');
Route::delete('/post/{post_id}','PostController@deletePost')->middleware('lead_post');
Route::get('/post/{post_id}','PostController@postDetail')->middleware('lead_post');
Route::post('/post/{post_id}','PostController@editPost')->middleware('lead_post');

Route::get('/post/{post_id}/creat_comment','CommentController@index')->middleware('logined');
Route::post('/post/{post_id}/comment','CommentController@storeComment')->middleware('logined');
Route::delete('/post/{post_id}/comment/{comment_id}','CommentController@deleteComment')->middleware('lead_comment_post');
Route::get('/post/{post_id}/comment/{comment_id}','CommentController@commentDetail')->middleware('lead_comment');
Route::post('/post/{post_id}/comment/{comment_id}','CommentController@editComment')->middleware('lead_comment');
Route::auth();