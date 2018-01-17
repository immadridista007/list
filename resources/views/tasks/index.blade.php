
@extends ('layouts.app')

@section ('content')
    <h1>Your Tasks</h1>
    @if (count ($tasks) > 0)
        @foreach ($tasks as $task)
          <div class="well">
              <div class="row">
                  <div class="col-md-8 col-sm8">
                      <h3><a href="{{url ("tasks/$task->id")}}">{{$task->title}}</a></h3>
                      <small>published on {{$task->created_at}} by {{$task->user->name}}</small>
                  </div>
              </div>
          </div>
        @endforeach
        {{$tasks->links()}}
        @else
        <p class="alert alert-info">No posts found</p>
    @endif
    @if (!Auth::guest())
        <a href="{{url ("/tasks/create")}}" class="btn btn-default">Add Tasks</a>
    @endif
@endsection