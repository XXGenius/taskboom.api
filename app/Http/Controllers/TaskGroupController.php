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
        $token = $request->input('token');
        if($token == $this->token){
            $taskGroup = TaskGroup::create($request->all());
            return response()->json($taskGroup);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateDay(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskGroup  = TaskGroup::find($id);
            $taskGroup->make = $request->input('make');
            $taskGroup->save();
            return response()->json($taskGroup);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteDay(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskGroup  = TaskGroup::find($id);
            $taskGroup->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $taskGroup  = TaskGroup::all();
            return response()->json($taskGroup);
        }else{
            return response()->json('The token does not match');
        }

    }
}