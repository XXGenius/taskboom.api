<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 18.12.17
 * Time: 14:02
 */

namespace App\Http\Controllers;


use App\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->input('token');
        if ($token == $this->token) {
            $title = $request->input('title');
            if (!$title) {
                return response()->json('пусто!');
            } else if ($title) {
                $priority = Priority::create($request->all());
                return response()->json($priority);
            }
        } else {
            return response()->json('The token does not match');
        }
    }

    public function index()
    {
        $priority = Priority::all();
        return response()->json($priority);
    }
}
