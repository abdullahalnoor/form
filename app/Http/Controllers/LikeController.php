<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Thread;
use App\Comment;

class LikeController extends Controller
{

    public function threadLike(Thread $thread){
        $liked = Like::where('user_id',auth()->user()->id)->where('likeable_id',$thread->id)->first();

        if($liked){
            $liked->delete();
        }else{
            $like = new  Like();
            $like->user_id = auth()->user()->id;
            $thread->likes()->save($like);
        }
        
        return back();
    }

    public function commentLike(Comment $comment){
        // dd($comment->id);
        $liked = Like::where('user_id',auth()->user()->id)->where('likeable_id',$comment->id)->first();
        if($liked ){
            // return 1;
            $liked->delete();
            
        }else{
            // return 0;
            $like = new  Like();
            $like->user_id = auth()->user()->id;
            $comment->likes()->save($like);
        }
        
        return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
