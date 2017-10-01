<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:48
 */

namespace App\Http\Controllers;


use App\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function createTaskStatus(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskStatus = TaskStatus::create($request->all());
            return response()->json($taskStatus);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateTaskStatus(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskStatus  = TaskStatus::find($id);
            $taskStatus->make = $request->input('make');
            $taskStatus->save();
            return response()->json($taskStatus);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteTaskStatus(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskStatus  = TaskStatus::find($id);
            $taskStatus->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskStatus = TaskStatus::all();
            return response()->json($taskStatus);
        }else{
            return response()->json('The token does not match');
        }

    }
}