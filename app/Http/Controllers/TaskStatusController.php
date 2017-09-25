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
    public function createTaskStatus(Request $request){

        $taskStatus = TaskStatus::create($request->all());
        return response()->json($taskStatus);
    }

    public function updateTaskStatus(Request $request, $id){
        $taskStatus  = TaskStatus::find($id);
        $taskStatus->make = $request->input('make');
        $taskStatus->save();
        return response()->json($taskStatus);
    }

    public function deleteTaskStatus($id){
        $taskStatus  = TaskStatus::find($id);
        $taskStatus->delete();
        return response()->json('Removed successfully.');
    }

    public function index()
    {
        $taskStatus = TaskStatus::all();
        return response()->json($taskStatus);
    }
}