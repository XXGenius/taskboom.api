<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 19.01.18
 * Time: 13:14
 */

namespace App\Http\Controllers;


use App\Lesson;
use App\Review;
use App\Specific;
use App\Unrested;
use App\Victory;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReview(Request $request)
    {
        $date = date("Y-m-d");
        $cycle_id = $request->input('cycle_id');
        $review = Review::where('cycle_id','=', $cycle_id)->get();
        return response()->json($review);
    }

    public function addReview($cycle_id, $user_id)
    {
        $datetime  = new \DateTime();
        $review = new Review([
            'user_id' => $user_id,
            'cycle_id' => $cycle_id,
            'date_end' => $datetime->add(new \DateInterval('P5D')),
            'date_start' => $datetime->add(new \DateInterval('P6D'))
        ]);
        $review->save();
        $review_id = $review->id;
        $this->addVictory($review_id);
        $this->addLesson($review_id);
        $this->addSpecific($review_id);
        $this->addUnrested($review_id);
        return response()->json($review);
    }

    public function addVictory($review_id)
    {
        for ($i = 0; $i < 5; $i++ ) {
            $task = new Victory([
                'text' => '',
                'review_id' => $review_id
            ]);
            $task->save();
        }
    }

    public function getVictory(Request $request)
    {
        $review_id = $request->input('review_id');
        $victory  = Victory::where('review_id','=',$review_id)->get();
        return response()->json($victory);
    }

    public function updateVictory(Request $request, $id)
    {
        $victory = Victory::find($id);
        $victory->text = $request->input('text');
        $victory->save();
        return response()->json($victory);

    }

    public function addLesson($review_id)
    {
        for ($i = 0; $i < 3; $i++ ) {
            $lesson = new Lesson([
                'text' => '',
                'review_id' => $review_id
            ]);
            $lesson->save();
        }
    }

    public function getLesson(Request $request)
    {
        $review_id = $request->input('review_id');
        $lesson  = Lesson::where('review_id','=',$review_id)->get();
        return response()->json($lesson);
    }

    public function updateLesson(Request $request, $id)
    {
        $victory = Lesson::find($id);
        $victory->text = $request->input('text');
        $victory->save();
        return response()->json($victory);

    }

    public function addUnrested($review_id)
    {
        for ($i = 0; $i < 3; $i++ ) {
            $unrested = new Unrested([
                'text' => '',
                'review_id' => $review_id
            ]);
            $unrested->save();
        }
    }

    public function getUnrested(Request $request)
    {
        $review_id = $request->input('review_id');
        $unrested  = Unrested::where('review_id','=',$review_id)->get();
        return response()->json($unrested);
    }

    public function updateUnrested(Request $request, $id)
    {
        $unrested = Unrested::find($id);
        $unrested->text = $request->input('text');
        $unrested->save();
        return response()->json($unrested);

    }

    public function addSpecific($review_id)
    {
        $spec = new Specific([
                'text' => '',
                'review_id' => $review_id
            ]);
        $spec->save();

    }

    public function getSpecific(Request $request)
    {
        $review_id = $request->input('review_id');
        $specific  = Specific::where('review_id','=',$review_id)->get();
        return response()->json($specific);
    }

    public function updateSpecific(Request $request, $id)
    {
        $specific = Specific::find($id);
        $specific->text = $request->input('text');
        $specific->save();
        return response()->json($specific);

    }
}