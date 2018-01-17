@extends ('layouts.app')
@section ('content')
    <a href="{{url ("tasks")}}" class="btn btn-default">Back</a>
    <h1>{{$task->title}}</h1>
    <h3>{{$task->description}}</h3>
    <a href="{{url ("tasks/edit/$task->id")}}" class="btn btn-info">Edit</a>
    <div class="pull-right">
        {{Form::open(['method' => 'POST' , 'action' => ['TasksController@delete' , $task->id]])}}
            {{Form::hidden('_method' , 'DELETE')}}
            {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}
        {{Form::close()}}
    </div>

@endsection