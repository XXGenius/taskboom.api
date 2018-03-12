<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 13:21
 */

namespace App\Http\Controllers;
use App\Cycle;
use App\Task;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function findByDate(Request $request, $date)
    {
        $token = $request->input('token');
        if($token == $this->token){
//            $tasks = Task::where('date','=',$date  )->get();
            $tasks = Task::where([['date','=',$date],['user_id','=', $request->input('user_id')]])->get();
            return response()->json($tasks);

        }else{
            return response()->json('The token does not match');
        }
    }







    public function createTask(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $title = $request->input('title');
            if(!$title){
                return response()->json('пусто!');
            }else if($title){
                $task = Task::create($request->all());
                return response()->json($task);
            }
        }else{
            return response()->json('The token does not match');
        }
    }





    public function updateTask(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Task::find($id);
            $task->text = $request->input('text');
            $task->save();
            return response()->json($task);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function checkTask(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Task::find($id);
            $task->checked = $request->input('checked');
            $task->save();
            return response()->json($task);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteTask(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Task::find($id);
            $task->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $tasks  = Task::all();
            return response()->json($tasks);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function getTaskById($cycle_id, $number)
    {
        $task  = Task::where([['cycle_id','=',$cycle_id],['number','=', $number]])->get();
        return $task;
    }

    public function getTasks(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $id = $request->input('cycle_id');
            $tasks = Task::where('cycle_id','=',$id)->get();
            return response()->json($tasks);
        }else{
            return response()->json('The token does not match');
        }
    }
    public function getWeekTasks($week_id)
    {
        $tasks = Task::where([['cycle_id', '=', $week_id], ['priority_id', '=', 1]])->get();
        return $tasks;
    }

    public function getDayTasks(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $week = Cycle::find($request->input('week_id'));
            if ($week->autofill) {
                $tasks = $this->getWeekTasks($request->input('week_id'));
                $date = $this->getDate($request->input('week_id'));
                $text = $tasks[$date]->text;
                $id = $request->input('day_id');
                $tasks = Task::where('day_id','=',$id)->get();
                $tasks[$date]->text = $text;
//                if(!isset($tasks[$date])){
//                    $id = $request->input('day_id');
//                    $tasks = Task::where('day_id','=',$id)->get();
//                    return response()->json($tasks);
//                }
                $tasks[$date]->save();
                return response()->json($tasks);
            }else{
                $id = $request->input('day_id');
                $tasks = Task::where('day_id','=',$id)->get();
                return response()->json($tasks);
            }

        }else{
            return response()->json('The token does not match');
        }
    }

    public function getDate($id)
    {
        $now = new \DateTime();
        $week = Cycle::find($id);
        $dateUser = $week->created_at;
        $date = new \DateTime($dateUser); // задаем дату в любом формате
        $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
        $i = $interval->days; // кол-во дней
        return $i;
    }
}
