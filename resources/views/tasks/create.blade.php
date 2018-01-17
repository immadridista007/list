@extends ('layouts.app')

@section ('content')
    <form action="{{url ("tasks/store")}}" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="title">Title:</label>
            <input type="text" name="title" value="" placeholder = "Task Title....." class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
@endsection