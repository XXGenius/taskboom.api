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
    public function createTask(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task = Task::create($request->all());
            return response()->json($task);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateTask(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Task::find($id);
            $task->make = $request->input('make');
            $task->save();
            return response()->json($task);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteTask(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Task::find($id);
            $task->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $tasks  = Task::all();
            return response()->json($tasks);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function getTaskById(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Task::find($id)->get();
            return response()->json($task);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function getMyTasks(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $day = $request->input('taskgroup_id');
            $tasks = Task::where('group_task_id','=',$day)->get();
            return response()->json($tasks);
        }else{
            return response()->json('The token does not match');
        }
    }
}