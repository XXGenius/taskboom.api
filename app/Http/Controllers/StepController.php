<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:19
 */

namespace App\Http\Controllers;


use App\Step;
use Illuminate\Http\Request;


class StepController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $steps  = Step::all();
            return response()->json($steps);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function getMySteps (Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $cycle_id = 27;
            $steps  = Step::where('cycle_id','=',$cycle_id);
            return response()->json($steps);
        }else{
            return response()->json('The token does not match');
        }
    }
}