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
    private $token = 'd7f6sd5a7854r85gasa6d5fg67sdg78df5gsf5gsd8';

    public function register(Request $request){
        $password = $request->input('password');
        if(!$password){
            return response()->json('Enter the password!');
        }else{
            $user = User::create($request->all());
            return response()->json($user);
        }

    }

    public function login(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where([['email','=',$email],['password','=', $password]])->get();
            if(count($user) == 0) {
                return response()->json('User not exist');
            }
            return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }

    }
}