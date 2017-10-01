<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:48
 */

namespace App\Http\Controllers;


use App\ExpLvl;
use Illuminate\Http\Request;

class ExpLvlController extends Controller
{
    public function createLvl(Request $request){
        $token = $request->input('token');
        if($token == $this->token){
            $lvl = ExpLvl::create($request->all());
            return response()->json($lvl);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateLvl(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $lvl  = ExpLvl::find($id);
            $lvl->make = $request->input('make');
            $lvl->save();
            return response()->json($lvl);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteLvl(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $lvl  = ExpLvl::find($id);
            $lvl->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $lvl = ExpLvl::all();
            return response()->json($lvl);
        }else{
            return response()->json('The token does not match');
        }

    }
}