<div class="card">

  <div class="card-body">
    <h4 class="card-title">
      <a href="{{route('thread.create')}}" class="btn btn-primary">Create Thread</a>
    </h4>

  </div>
  <ul class="list-group list-group-flush">
    @forelse ($threads as $thread)
    <a href="{{route('thread.show',$thread->id)}}" class="list-group-item">
      <h4>{{ $thread->subject }}</h4>
      <p> {{ $thread->thread }} </p>
    </a>
    @empty
    <li class="list-group-item bg-danger text-white text-center"> No Thread Found... </li>
    @endforelse
  </ul>
</div>