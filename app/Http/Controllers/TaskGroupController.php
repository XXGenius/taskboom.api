<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 16:56
 */

namespace App\Http\Controllers;



use App\TaskGroup;
use Illuminate\Http\Request;

class TaskGroupController extends Controller
{
    public function createDay(Request $request){
        $taskGroup = TaskGroup::create($request->all());
        return response()->json($taskGroup);
    }

    public function updateDay(Request $request, $id){
        $taskGroup  = TaskGroup::find($id);
        $taskGroup->make = $request->input('make');
        $taskGroup->save();
        return response()->json($taskGroup);
    }

    public function deleteDay($id){
        $taskGroup  = TaskGroup::find($id);
        $taskGroup->delete();
        return response()->json('Removed successfully.');
    }

    public function index(){
        $taskGroup  = TaskGroup::all();
        return response()->json($taskGroup);
    }
}