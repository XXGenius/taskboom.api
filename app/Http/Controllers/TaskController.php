<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 13:21
 */

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTask(Request $request){
        $task = Task::create($request->all());
        return response()->json($task);
    }

    public function updateTask(Request $request, $id){
        $task  = Task::find($id);
        $task->make = $request->input('make');
        $task->save();
        return response()->json($task);
    }

    public function deleteTask($id){
        $task  = Task::find($id);
        $task->delete();
        return response()->json('Removed successfully.');
    }

    public function index(){
        $tasks  = Task::all();
        return response()->json($tasks);
    }
}