<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:18
 */

namespace App\Http\Controllers;


use App\LengthCycle;
use Illuminate\Http\Request;

class LengthCycleController extends Controller
{
    public function createLengthCycle(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task = LengthCycle::create($request->all());
                return response()->json($task);
        }else{
            return response()->json('The token does not match');
        }
    }
}