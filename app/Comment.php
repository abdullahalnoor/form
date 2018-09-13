<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
     public function comments(){
        return $this->morphMany('App\Comment','commentable')->latest();
    }
    public function likes(){
        return $this->morphMany('App\Like','likeable');
    }

    public function likeByUser($id){
       $liked = \App\Like::where('user_id',auth()->user()->id)->where('likeable_id',$id)->count();
       if($liked == 0){
           return false;
       }else{
           return true;
       }
    }
    
   
}
