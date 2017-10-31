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

    public function loginAuth(Request $request)
    {
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $request->input('token') . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);
        $uid = $user['uid'];
        $userdb = User::where('uid','=',$uid)->get();
        if(!$userdb){
            $userdb = new User([
                'email' => $user['email'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'uid' => $user['uid'],
                'photo' => $user['photo'],
                'lvl' => 0,
                'exp' => 0,
                'user_role_id' => 1,
                'identity' => $user['identity'],
                'network' => $user['network'],
                'profile' => $user['profile']
            ]);
            $userdb->save();
            return response()->json($userdb);
        }
        return response()->json($userdb);
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
            if(!$password){
                return response()->json('Enter the password!');
            }else{
                $user = User::create($request->all());
                return response()->json($user);
            }
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