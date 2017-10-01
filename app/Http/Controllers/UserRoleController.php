<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:49
 */

namespace App\Http\Controllers;


use App\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function createUserRole(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userRole = UserRole::create($request->all());
            return response()->json($userRole);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateUserRole(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userRole  = UserRole::find($id);
            $userRole->make = $request->input('make');
            $userRole->save();
            return response()->json($userRole);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteUserRole(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userRole  = UserRole::find($id);
            $userRole->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $userRole = UserRole::all();
            return response()->json($userRole);
        }else{
            return response()->json('The token does not match');
        }

    }
}