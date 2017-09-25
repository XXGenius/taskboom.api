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
        $project = Project::create($request->all());
        return response()->json($project);
    }

    public function updateProject(Request $request, $id){
        $project  = Project::find($id);
        $project->make = $request->input('make');
        $project->save();
        return response()->json($project);
    }

    public function deleteProject($id){
        $project  = Project::find($id);
        $project->delete();
        return response()->json('Removed successfully.');
    }

    public function index()
    {
        $project = Project::all();
        return response()->json($project);
    }
}