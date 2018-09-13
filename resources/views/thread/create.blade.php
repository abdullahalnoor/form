@extends('layouts.front') 
@section('content')
<div class="card">
  <div class="card-header">
    Create Thread
  </div>
  <div class="card-body">
    <form action="{{route('thread.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Subject</label>
        <input type="text" name="subject" id="" class="form-control" placeholder="" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="">thread</label>
        <textarea type="text" name="thread" id="" class="form-control" placeholder="Thread"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info btn-block" value="Create Thread">
      </div>
    </form>
  </div>
</div>
@endsection