@extends ('layouts.app')

@section ('content')
    <a href="{{url ("tasks/$task->id")}}" class="btn btn-default">back</a>
    {{ Form::open(['action' => ['TasksController@update' , $task->id] , 'method' => 'POST'])}}
        <div class="form-group">
            {{csrf_field()}}
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$task->title}}" placeholder = "Task Title....." class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$task->description}}</textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="hidden" name="_method" value="PUT">
        </div>
    {{ Form::close()}}
@endsection