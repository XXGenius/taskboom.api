<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:19
 */

namespace App\Http\Controllers;


use App\Day;
use App\Task;
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
                'gratitude_day' => '',
                'comment_progress' => '',
                'comment_task' => ''
            ]);
            $day->save();
            $id = $day->id;
            $this->createDayTask($id);
            return response()->json($day);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function createDayTask($day_id)
    {
        $task = new Task([
            'text' => '',
            'cycle_id' => 106,
            'number' =>  1,
            'day_id' => $day_id,
            'priority_id' => 1,
            'comment_task' => '',
            'comment_progress' => '',
            'gratitude_day' => ''
        ]);
        $task->save();

        for ($i = 0; $i < 5; $i++ ) {
            $task = new Task([
                'text' => '' ,
                'cycle_id' => 106,
                'number' => $i + 1,
                'day_id' => $day_id,
                'priority_id' => 2,
                'comment_task' => '',
                'comment_progress' => '',
                'gratitude_day' => ''
            ]);
            $task->save();
        }
    }

    public function getDay(Request $request)
    {
        $user_id = $request->input('user_id');
        $date = $request->input('date');
        $day  = Day::where([['date','=',$date],['user_id','=', $user_id]])->get();
        return response()->json($day);

    }

    public function index()
    {
        $day = Day::all();
        return response()->json($day);
    }

    public function updateProgressComment(Request $request, $id)
    {
        $day  = Day::find($id);
        $day->comment_progress = $request->input('comment_progress');
        $day->save();
        return response()->json($day);

    }

    public function updateTaskComment(Request $request, $id)
    {
        $day  = Day::find($id);
        $day->comment_task = $request->input('comment_task');
        $day->save();
        return response()->json($day);

    }

    public function updateGratitude(Request $request, $id)
    {
        $day  = Day::find($id);
        $day->gratitude_day = $request->input('gratitude_day');
        $day->save();
        return response()->json($day);

    }
}