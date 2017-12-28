<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:19
 */

namespace App\Http\Controllers;


use App\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->input('token');
        $date = $request->input('date');
        if($token == $this->token){
            $day = new Day([
                'user_id' => $request->input('user_id'),
                'date' => $date,
            ]);
            $day->save();
            return response()->json($day);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function getDay(Request $request)
    {
        $user_id = $request->input('user_id');
        $date = $request->input('date');
        $day  = Day::where([['date','=',$date],['user_id','=', $user_id]])->get();
        return $day;

    }
}