<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Thread;

class CommentController extends Controller
{
    
    public function addThreadComment(Request $request,Thread $thread){
        //  return $request->all();

        $this->validate($request,[
            'body' => 'required',
        ]);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $thread->comments()->save($comment);
        return back();
    }

     public function addReplyComment(Request $request,Comment $comment){
        //  return $request->all();
        // dd($comment);
        $this->validate($request,[
            'body' => 'required',
        ]);
        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;
        $comment->comments()->save($reply);
        return back();
    }

    public function markAsSolution(Request $request){
        $thread = Thread::find($request->thread_id);
        $thread->solution = $request->answer_id;
        $thread->save();
        return back();
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
