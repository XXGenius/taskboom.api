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
        if($token == $this->token){
            $day = Day::create($request->all());
            return response()->json($day);
        }else{
            return response()->json('The token does not match');
        }
    }
}