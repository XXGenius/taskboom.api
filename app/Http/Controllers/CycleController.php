<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:20
 */

namespace App\Http\Controllers;


use App\Cycle;
use App\Day;
use App\Reward;
use App\Step;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    public function createLongCycle(Request $request)
    {
        $token = $request->input('token');
        $datetime  = new \DateTime();
        $date = $datetime->format('Y-m-d');
        if($token == $this->token){
            $cycle = new Cycle([
                'user_id' => $request->input('user_id'),
                'date_start' => $date,
                'date_end' => $datetime->add(new \DateInterval('P3M')),
                'length_cycle_id' => 2,
                'autofill' => false
            ]);
            $cycle->save();
            $cycle_id = $cycle->id;
            $this->createtask($cycle_id);
            $task  = Task::where([['cycle_id','=',$cycle_id],['number','=', 1]])->get();
            $task_id = $task['0']->id;
            $this->createSteps($cycle_id, $task_id, $request->input('user_id'));
            $this->createRewards($cycle_id, $task_id, $request->input('user_id'));
            return response()->json($cycle);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function createWeekCycle(Request $request)
    {
        $token = $request->input('token');
        $datetime  = new \DateTime();
        $date = $datetime->format('Y-m-d');
        if($token == $this->token){
        $cycle = new Cycle([
            'user_id' => $request->input('user_id'),
            'date_start' => $date,
            'date_end' => $datetime->add(new \DateInterval('P7D')),
            'length_cycle_id' => 3,
            'autofill' => true
        ]);
        $cycle->save();
        $day = new Day([
            'user_id' => $request->input('user_id'),
            'date' => $date,
        ]);
        $day->save();
        $day_id = $day->id;
        $this->createDayTask($day_id);
        $cycle_id = $cycle->id;
        $review = new ReviewController();
        $review->addReview($cycle_id, $request->input('user_id'));
        $this->createWeektask($cycle_id);
        $task  = Task::where([['cycle_id','=',$cycle_id],['number','=', 1]])->get();
        $task_id = $task['0']->id;
        $this->createReward($cycle_id, $task_id,  $request->input('user_id'));
        return response()->json($cycle);
    }else{
        return response()->json('The token does not match');
    }

    }

    public function onAutofill(Request $request, $id)
    {
        $week = Cycle::find($id);
        $week->autofill = $request->input('autofill');
        $week->save();
        return response()->json($week);

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
                'text' => '',
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

    public function createWeektask($cycle_id)
    {
        for ($i = 0; $i < 5; $i++ ) {
            $task = new Task([
                'text' => '',
                'cycle_id' => $cycle_id,
                'number' => $i + 1,
                'day_id' => 1,
                'priority_id' => 1,
            ]);
            $task->save();
        }
        for ($i = 0; $i < 10; $i++ ) {
            $task = new Task([
                'text' => '',
                'cycle_id' => $cycle_id,
                'number' => $i + 1,
                'day_id' => 1,
                'priority_id' => 2,
            ]);
            $task->save();
        }


    }

  public function createtask($cycle_id)
  {
      for ($i = 0; $i < 3; $i++ ) {
          $task = new Task([
              'text' => '',
              'cycle_id' => $cycle_id,
              'number' => $i + 1,
              'day_id' => 1,
              'priority_id' => 1,
          ]);
          $task->save();
      }

  }

  public function createSteps($cycle_id, $task_id, $user_id)
  {
      for ($i = 0; $i < 10; $i++ ) {
      $step = new Step([
          'user_id' => $user_id,
          'text' => '',
          'cycle_id' => $cycle_id,
          'task_id' => $task_id
      ]);
      $step->save();
  }
      for ($i = 0; $i < 4; $i++ ) {
          $step = new Step([
              'user_id' => $user_id,
              'text' => '',
              'cycle_id' => $cycle_id,
              'task_id' => $task_id + 1
          ]);
          $step->save();
      }
      for ($i = 0; $i < 4; $i++ ) {
          $step = new Step([
              'user_id' => $user_id,
              'text' => '',
              'cycle_id' => $cycle_id,
              'task_id' => $task_id + 2
          ]);
          $step->save();
      }

  }

   public function createReward($cycle_id, $task_id,  $user_id)
   {
       $step = new Reward([
           'user_id' => $user_id,
           'text' => '',
           'cycle_id' => $cycle_id,
           'task_id' => $task_id

       ]);
       $step->save();
   }

    public function createRewards($cycle_id, $task_id, $user_id)
    {
        for ($i = 0; $i < 3; $i++ ) {
            $step = new Reward([
                'user_id' => $user_id,
                'text' => '',
                'cycle_id' => $cycle_id,
                'task_id' => $task_id
            ]);
            $step->save();
        }
        for ($i = 0; $i < 1; $i++ ) {
            $step = new Reward([
                'user_id' => $user_id,
                'text' => '',
                'cycle_id' => $cycle_id,
                'task_id' => $task_id + 1
            ]);
            $step->save();
        }
        for ($i = 0; $i < 1; $i++ ) {
            $step = new Reward([
                'user_id' => $user_id,
                'text' => '',
                'cycle_id' => $cycle_id,
                'task_id' => $task_id + 2
            ]);
            $step->save();
        }

    }

    public function getDate(Request $request) {
        $now  = new \DateTime();
        $user = User::find($request->input('user_id'));
        $dateUser = $user->created_at;
        $date = new \DateTime($dateUser); // задаем дату в любом формате
        $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
        $i =  $interval->days; // кол-во дней
        return response()->json($i);
    }

    public function getLong(Request $request)
    {
        $date = date("Y-m-d");
        $user_id = $request->input('user_id');
        $cycle = Cycle::where([['user_id','=',$user_id],['length_cycle_id','=', 2 ],['date_end','>=', $date]])->get();
        return response()->json($cycle);
    }

    public function getWeek(Request $request)
    {
        $date = date("Y-m-d");
        $user_id = $request->input('user_id');
        $cycle = Cycle::where([['user_id','=',$user_id],['length_cycle_id','=', 3 ],['date_end','>=', $date]])->get();
        return response()->json($cycle);
    }

    public function deleteCycle(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $task  = Cycle::find($id);
            $task->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

}
