<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/tasks/store' , function () {
    return redirect ('/tasks')->with('error' , 'not allowed');
});

Route::get('/tasks/delete' ,  function () {
    return redirect ('/tasks')->with('error' , 'not allowed');
});

Route::get('/tasks/delete/{id}' ,  function () {
    return redirect ('/tasks')->with('error' , 'not allowed');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks' , 'TasksController@index');

Route::get('/tasks/create' , 'TasksController@create');

Route::post('/tasks/store' , 'TasksController@store');

//Route::get('/tasks/{id}' , 'TasksController@show');

//Route::get('/tasks/edit/{id}' , 'TasksController@edit');

Route::put('/tasks/update/{id}' , 'TasksController@update');

Route::get ('/tasks/update/{id}' , function () {
    return redirect('/tasks')->with('error' , 'Not authorized');
});

Route::get ('/tasks/update' , function () {
    return redirect('/tasks')->with('error' , 'Not authorized');
});

Route::get ('/tasks/update' , function () {
    return redirect('/tasks')->with('error' , 'Not authorized');
});



Route::delete('/tasks/delete/{id}' , 'TasksController@delete');

Route::get('/tasks/edit' , function () {
    return redirect ('/tasks')->with('error' , 'Not able to find which post to edit');
});

Route::put('/tasks/update/{id}' , 'TasksController@update');

Route::get('/tasks/edit/{id}' , 'TasksController@edit');

Route::get('/tasks/{id}' , 'TasksController@show');