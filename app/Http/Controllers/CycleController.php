<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 11.12.17
 * Time: 22:20
 */

namespace App\Http\Controllers;


use App\Cycle;
use App\Step;
use App\Task;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    public function createLongCycle(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $cycle = new Cycle([
                'user_id' => $request->input('user_id'),
                'date_start' => date('Y-d-m'),
                'date_end' => date('Y-d-m', mktime(0, 0, 0, date('m') + 3, date('d') , date('Y'))),
                'length_cycle_id' => 2
            ]);
            $cycle->save();
            $cycle_id = $cycle->id;
            $this->createtask($cycle_id);
            $task  = Task::where([['cycle_id','=',$cycle_id],['number','=', 1]])->get();
            $task_id = $task['0']->id;
            $this->createSteps($cycle_id, $task_id, $request->input('user_id'));
            return response()->json($cycle);
        }else{
            return response()->json('The token does not match');
        }
    }

  public function createtask($cycle_id)
  {
      for ($i = 0; $i < 3; $i++ ) {
          $task = new Task([
              'text' => 'Введите описание задачи №'.($i+1).' и нажмите Enter ',
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
          'text' => 'Введите описание шага и нажмите Enter',
          'cycle_id' => $cycle_id,
          'task_id' => $task_id
      ]);
      $step->save();
  }
      for ($i = 0; $i < 4; $i++ ) {
          $step = new Step([
              'user_id' => $user_id,
              'text' => 'Введите описание шага и нажмите Enter',
              'cycle_id' => $cycle_id,
              'task_id' => $task_id + 1
          ]);
          $step->save();
      }
      for ($i = 0; $i < 4; $i++ ) {
          $step = new Step([
              'user_id' => $user_id,
              'text' => 'Введите описание шага и нажмите Enter',
              'cycle_id' => $cycle_id,
              'task_id' => $task_id + 2
          ]);
          $step->save();
      }

  }

    public function getLong(Request $request)
    {
        $user_id = $request->input('user_id');
        $cycle = Cycle::where('user_id','=',$user_id)->get();
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