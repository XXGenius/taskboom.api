<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:48
 */

namespace App\Http\Controllers;


use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createProject(Request $request){
        $token = $request->input('token');
        if($token == $this->token){
            $input = $request->all();
            $project = Project::create($input);
            return response()->json($project);
        }else{
            return response()->json('The token does not match');
        }


    }

    public function updateProject(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $project  = Project::find($id);
            $project->title = $request->input('title');
            $project->save();
            return response()->json($project);
        }else{
            return response()->json('The token does not match');
        }


    }

    public function deleteProject(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $project  = Project::find($id);
            $project->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }


    }

    public function getProjectById(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $project  = Project::find($id)->get();
            return response()->json($project);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $project = Project::all();
            return response()->json($project);
        }else{
            return response()->json('The token does not match');
        }


    }
}