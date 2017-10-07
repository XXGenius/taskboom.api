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
        $token = $request->input('token');
        if($token == $this->token){
            $tag = Tag::create($request->all());
            return response()->json($tag);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateTag(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $tag  = Tag::find($id);
            $tag->title = $request->input('title');
            $tag->save();
            return response()->json($tag);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteTag(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $tag  = Tag::find($id);
            $tag->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function getTagById(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $tag  = Tag::find($id)->get();
            return response()->json($tag);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $tag = Tag::all();
            return response()->json($tag);
        }else{
            return response()->json('The token does not match');
        }

    }

}