<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:19
 */

namespace App\Http\Controllers;


use App\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function getMyRewards (Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $cycle_id = $request->input('cycle_id');
            $steps  = Reward::where('cycle_id','=',$cycle_id)->get();
            return response()->json($steps);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function update(Request $request, $id)
    {
        $reward  = Reward::find($id);
        $reward->text = $request->input('text');
        $reward->save();
        return response()->json($reward);
    }

}