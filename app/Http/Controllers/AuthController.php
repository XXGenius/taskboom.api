<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 28.09.17
 * Time: 14:34
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email','=',$email)->get();
        return response()->json($user);
    }
}