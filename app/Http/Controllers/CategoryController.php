<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 28.11.17
 * Time: 15:33
 */

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $token = $request->input('token');
        if($token == $this->token){
            $category = Category::create($request->all());
            return response()->json($category);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function updateLvl(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $lvl  = ExpLvl::find($id);
            $lvl->exp = $request->input('exp');
            $lvl->level = $request->input('level');
            $lvl->save();
            return response()->json($lvl);
        }else{
            return response()->json('The token does not match');
        }

    }

    public function deleteLvl(Request $request, $id){
        $token = $request->input('token');
        if($token == $this->token){
            $lvl  = ExpLvl::find($id);
            $lvl->delete();
            return response()->json('Removed successfully.');
        }else{
            return response()->json('The token does not match');
        }

    }

    public function getLvlById(Request $request, $id)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $lvl  = ExpLvl::find($id)->get();
            return response()->json($lvl);
        }else{
            return response()->json('The token does not match');
        }
    }

    public function index(Request $request)
    {
        $token = $request->input('token');
        if($token == $this->token){
            $category = Category::all();
            return response()->json($category);
        }else{
            return response()->json('The token does not match');
        }

    }
}