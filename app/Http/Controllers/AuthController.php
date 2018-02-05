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
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function loginAuth(Request $request)
    {
        $uid = $request->input('uid'); //ToDo исправвить вход !!!!
        $user = User::where('uid','=',$uid)->get();
        if(count($user) == 0){
            $userdb = new User([
                'email' => $uid .'@boom.com',
                'first_name' => $request->input('name'),
                'last_name' => $request->input('name'),
                'uid' => $uid,
                'photo' => $request->input('image'),

            ]);
            $userdb->save();
            return response()->json($userdb);
        }else{
            return response()->json($user);
        }

    }

    public function getCurrentUser(Request $request)
    {
        $uid = $request->input('uid');
        $user = User::where('uid','=',$uid)->get();
        return response()->json($user);
    }

    public function index(Request $request)
    {

        $token = $request->input('token');
        if ($token == $this->token) {
            $users = User::all();
            return response()->json($users);
        } else {
            return response()->json('The token does not match');
        }
    }

    public function deleteUser(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $user  = User::find($id);
            $user->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function createUser(Request $request){
        $token = $request->input('token');
        if($token == $this->token){
            $user = User::create($request->all());
            return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateUser(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $user  = User::find($id);
            $user->make = $request->all();
            $user->save();
            return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function register(Request $request){
        $token = $request->input('token');
        if($token == $this->token){
            $password = $request->input('password');
            $user = new User([
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'uid' => '"'. mt_rand() .'"',

                ]);
                $user->save();
                return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }


    }


    public function getUserById(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $user  = User::find($id)->get();
            return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function getUserByEmail(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $email = $request->input('email');
            $user  = User::where('email', '=', $email)->get();
            return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function login(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where([['email','=',$email],['password','=', $password]])->get();
            return response()->json($user);
        }else{
            return response()->json('The token does not match');
        }

    }
}