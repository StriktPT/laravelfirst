<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{

    public function index() {
        $user = User::find(auth()->user()->id);
        return view('tasks.index', compact('user'));
      }

    public function store() {
        $task = new Task();
        $task->name = request('name');
        $task->user_id = auth()->user()->id;
        if ($task->name != '' ) {
            $task->save();
            return redirect()->route('tasks.index')->with('mssg1', 'Task <b>added</b> sucessfully!');
        } else {
            return redirect()->route('tasks.index')->with('mssg3', 'Task <b>not performed</b>. Please, fill with an available task.');
        }
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        $task->name = request('name');
        if ($task->name != '' ) {
            $task->save();
            return redirect()->route('tasks.index')->with('mssg2', 'Task <b>updated</b> sucessfully!');
        } else {
            return redirect()->route('tasks.index')->with('mssg3', 'Task <b>not performed</b>. Please, fill with an available task.');
        }
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('mssg4', 'Task <b>deleted</b> sucessfully!');
    }
}