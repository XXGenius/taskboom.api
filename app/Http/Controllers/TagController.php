<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:48
 */

namespace App\Http\Controllers;


use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function createTag(Request $request){
        $tag = Tag::create($request->all());
        return response()->json($tag);
    }

    public function updateTag(Request $request, $id){
        $tag  = Tag::find($id);
        $tag->make = $request->input('make');
        $tag->save();
        return response()->json($tag);
    }

    public function deleteTag($id){
        $tag  = Tag::find($id);
        $tag->delete();
        return response()->json('Removed successfully.');
    }

    public function index()
    {
        $tag = Tag::all();
        return response()->json($tag);
    }

}