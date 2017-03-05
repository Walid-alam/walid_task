<?php
use App\Task;
use App\Http\Controllers;

Route::get('/', function ()
{
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('homepage',['tasks' => $tasks]);
});
//for Creating Task
Route::post('/create_task','main_controller@create');

Route::get('/add_task',function()
{
    return view('adding_task');
});

//for Showing Task
Route::get('/task/{id}','main_controller@show');

//for Updating Task
Route::get('/task/{id}/edit','main_controller@edit');

Route::PUT('/task/{id}','main_controller@update');

//for Deleting Task
Route::delete('/task/{id}/delete','main_controller@destroy');
