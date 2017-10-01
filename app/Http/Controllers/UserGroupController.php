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
    public function createUserGroup(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userGroup = UserGroup::create($request->all());
            return response()->json($userGroup);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateUserGroup(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userGroup  = UserGroup::find($id);
            $userGroup->make = $request->input('make');
            $userGroup->save();
            return response()->json($userGroup);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteUserGroup(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userGroup  = UserGroup::find($id);
            $userGroup->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userGroup = UserGroup::all();
            return response()->json($userGroup);
        }else{
            return response()->json('The token does not match');
        }

    }
}