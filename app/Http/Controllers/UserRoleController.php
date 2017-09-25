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
    public function createUserRole(Request $request){
        $userRole = UserRole::create($request->all());
        return response()->json($userRole);
    }

    public function updateUserRole(Request $request, $id){
        $userRole  = UserRole::find($id);
        $userRole->make = $request->input('make');
        $userRole->save();
        return response()->json($userRole);
    }

    public function deleteUserRole($id){
        $userRole  = UserRole::find($id);
        $userRole->delete();
        return response()->json('Removed successfully.');
    }

    public function index()
    {
        $userRole = UserRole::all();
        return response()->json($userRole);
    }
}