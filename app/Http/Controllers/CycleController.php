<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:20
 */

namespace App\Http\Controllers;


use App\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    public function createLongCycle(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $cycle = new Cycle([
                'user_id' => $request->input('user_id'),
                'date_start' => date('mm-dd-yyyy', 1),
                'date_end' => date('mm-dd-yyyy', +1)
            ]);
            $cycle->save();
            return response()->json($cycle);
        }else{
            return response()->json('The token does not match');
        }
    }

}