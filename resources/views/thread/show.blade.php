@extends('layouts.front') 
@section('content')
<div class="card">
  <div class="card-header">
    {{ $thread->subject }}
  </div>
  <div class="card-body">
    {{ $thread->thread }}
    <br>
    <span>
      <a href="{{route('thread.like',$thread->id)}}" class="btn btn-info @auth @if($thread->likeByUser($thread->id)) btn-danger @else btn-info @endif @endauth">Like</a>
    </span>
    <span class="badge badge-primary"> {{ $thread->likes->count() }} </span>

  </div>
  @auth @if (auth()->user()->id == $thread->user_id)
  <div class="card-footer">
    <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-warning">Edit</a>

    <form action="{{route('thread.destroy',$thread->id)}}" method="POST">
      @csrf {{ method_field('DELETE') }}
      <input type="submit" class="btn btn-danger" value="Delete">
    </form>
  </div>
  @endif @endauth
</div>



<div class=" {{ $thread->comments->count() == 0?'':" "}} jumbotron">
  <div class="row">
    <div class="col-md-11 offset-md-1">
      <ul>
        @foreach ($thread->comments as $answer)
        <li>
          <p> {{ $answer->body }} </p>
          <span>
                <a href="{{route('comment.like',$answer->id)}}" 
                  class="btn btn-info
               @auth @if($answer->likeByUser($answer->id)) btn-danger @else btn-info @endif @endauth
                  ">Like</a>
               
                                 
                </span>
          <span class="badge badge-primary"> {{ $answer->likes->count() }} </span> @if (empty($thread->solution))
          <form class="float-right" action="{{route('mark.solution.store')}}" method="POST">
            @csrf
            <input type="hidden" name="thread_id" value="{{$thread->id}}">
            <input type="hidden" name="answer_id" value="{{$answer->id}}">
            <input type="submit" class="btn btn-success" value="Mark as Solution">
          </form>
          @elseif($thread->solution == $answer->id )
          <a href="" class="btn btn-success float-right">Solution</a> <br> @endif



          <small class="float-right">
            {{ $answer->user->name }}  {{ $answer->created_at->diffforhumans() }}
            <a href="">Edit</a>
            <a href="">Delete</a>
          </small>
          <br>

          <ol class="mt-3">
            @foreach ($answer->comments as $reply)
            <li>
              <p> {{ $reply->body }} </p>
              <span>
                              <a href="{{route('comment.like',$reply->id)}}" class="btn btn-info @auth @if($reply->likeByUser($reply->id)) btn-danger @else btn-info @endif @endauth">Like</a>
                              
              </span>
              <span class="badge badge-primary"> {{ $reply->likes->count() }} </span>
              <small class="float-right">
                      {{ $reply->user->name }}  {{ $reply->created_at->diffforhumans() }}
                      <a href="">Edit</a>
                      <a href="">Delete</a>
                    </small>
            </li>
            @endforeach
          </ol>
        </li>
        <div class="col-md-12">
          <form action="{{route('reply.comment.store',$answer->id)}}" method="POST">
            @csrf
            <div class="form-group">
              <textarea name="body" id="" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary float-right" value="Reply">
            </div>
          </form>
        </div>
        @endforeach
      </ul>
    </div>
  </div>


  @auth
  <div class="col-md-12 mt-5">
    <form action="{{route('thread.comment.store',$thread->id)}}" method="POST">
      @csrf
      <div class="form-group">
        <textarea name="body" id="" cols="30" rows="2" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary float-right" value="Comment">
      </div>
    </form>
  </div>
  @endauth

</div>
@endsection