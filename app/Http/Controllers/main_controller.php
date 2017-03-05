<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use view,response,input,mail,Session;
use Illuminate\Pagination;
class main_controller extends Controller
{

    function create(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'description' => 'required|max:255',
            ]);

            if ($validator->fails())
            {

                return redirect('/add_task')->withInput()->withErrors($validator);
            }

            $task = new Task;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();
            return redirect('/')->with(Session::flash('success', 'This is a message!'));
    }


    public function show($id)
    {
            $tasks = Task::findOrFail($id);
            //dd($tasks);

            return view('showing_task',['tasks' => $tasks]);
    }

    public function edit($id)
    {
        $tasks = Task::findOrFail($id);

        return view('editing_task',['tasks' => $tasks]);
    }


    public function update(Request $request, $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->update($request->all());
//        dd($tasks);
       return redirect('/')->with(Session::flash('update', 'This is a message!'));
    }


     public function destroy($id)
        {
            Task::findOrFail($id)->delete();

            return redirect('/')->with(Session::flash('delete','This is a message'));
        }
}
