<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 27.09.17
 * Time: 13:24
 */

namespace App\Http\Controllers;


use App\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function createUserGroup(Request $request){
        $userGroup = UserGroup::create($request->all());
        return response()->json($userGroup);
    }

    public function updateUserGroup(Request $request, $id){
        $userGroup  = UserGroup::find($id);
        $userGroup->make = $request->input('make');
        $userGroup->save();
        return response()->json($userGroup);
    }

    public function deleteUserGroup($id){
        $userGroup  = UserGroup::find($id);
        $userGroup->delete();
        return response()->json('Removed successfully.');
    }

    public function index()
    {
        $userGroup = UserGroup::all();
        return response()->json($userGroup);
    }
}