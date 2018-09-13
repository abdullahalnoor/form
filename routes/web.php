<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Thread;

Route::get('/', function () {
    $threads = Thread::paginate(15);
    return view('welcome',compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/thread','ThreadController');

Route::resource('/comment','CommentController',['only' => ['update','destroy']]);

Route::post('/comment/create/{thread}','CommentController@addThreadComment')->name('thread.comment.store');
Route::post('/reply/create/{comment}','CommentController@addReplyComment')->name('reply.comment.store');
Route::post('/mark/solution','CommentController@markAsSolution')->name('mark.solution.store');


Route::group(['middleware'=>'auth'],function(){
    Route::resource('/like','LikeController');

Route::get('/like/thread/{thread}','LikeController@threadLike')->name('thread.like');
Route::get('/like/comment/{comment}','LikeController@commentLike')->name('comment.like');
});