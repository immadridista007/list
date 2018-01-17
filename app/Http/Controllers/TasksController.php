<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\User;

class TasksController extends Controller
{
    //

    /*
     * Using the middleware authentication and putting an authentication guard on the tasks page and routes
     * User must be authenticated to access , create , update and delete tasks
     * */
    public function __construct() {
        return $this->middleware('auth');
    }

    /*
     *
     * */

    /*
     * read
     * */
    public function index () {
        $user = Auth::user();
        //return 4;
        $tasks = $user->task();
        //a collection is returned
        $tasks = $tasks->paginate(4);

        //return 4;
        return view('tasks.index')->with('tasks' , $tasks);
    }

    public function show(int $id) {
        $task = Task::find($id);
        //return dd ($task);
        return view('tasks.show')->with('task' , $task);
    }


    public function create () {
        return view ('tasks.create');
    }


    /*
     * @param takes a request of posts type that is triggered after click the post submit button
     * create a new task class with the help of eloquent ORM
     * updates the task details for saving in the tasks table in the database
     *saves the newly created task
     * */

    public function store (Request $request) {
        $this->validate($request , [
            'title' => 'required' ,
            'description' => 'required',
        ]);
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect('/tasks')->with('success' , 'Post created');
    }


    public function edit (int $id) {
        $task = Task::find($id);
        return view ('tasks.edit')->with('task' , $task);
    }

    /*
     * @param request and id of the task to be updated
     * returns or redirects us to /tasks page which lists us all the tasks of the authenticated logged in user
     * */

    public function update (Request $request , int $id) {
        $this->validate($request , ['title' => 'required' ,
            'description' => 'required',
        ]);
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();
        return redirect ('/tasks')->with('success' , 'Post Updated');
    }

    /*
     * @param task id
     * deletes the task
     * @returns void
     * */

    public function delete (int $id) {
        $task = Task::find($id);
        if (Auth::user()->id != $task->user->id) {
            return redirect ('/tasks')->with('error' , 'Not Allowed to delete others tasks');
        }
        $task->delete();
        return redirect('/tasks')->with('success' , 'Task done');
    }

}
