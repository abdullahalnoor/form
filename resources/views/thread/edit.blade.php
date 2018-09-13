@extends('layouts.front') 
@section('content')
<div class="card">
  <div class="card-header">
    Update Thread
  </div>
  <div class="card-body">
    <form action="{{route('thread.update',$thread->id)}}" method="POST">
      @csrf {{ method_field('PUT') }}
      <div class="form-group">
        <label for="">Subject</label>
        <input type="text" name="subject" value="{{$thread->subject}}" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="">thread</label>
        <textarea type="text" name="thread" class="form-control" placeholder="Thread">{{$thread->thread}}</textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info btn-block" value="Update Thread">
      </div>
    </form>
  </div>
</div>
@endsection