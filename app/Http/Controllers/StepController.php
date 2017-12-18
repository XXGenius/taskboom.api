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
            $cycle_id = $request->input('cycle_id');
            $steps  = Step::where('cycle_id','=',$cycle_id)->get();
            return response()->json($steps);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function update(Request $request, $id)
    {
        $step  = Step::find($id);
        $step->text = $request->input('text');
        $step->save();
        return response()->json($step);
    }
}