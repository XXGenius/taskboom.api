<?php
/**
 * Created by PhpStorm.
 * User: genius
 * Date: 25.09.17
 * Time: 17:48
 */

namespace App\Http\Controllers;


use App\ExpLvl;
use Illuminate\Http\Request;

class ExpLvlController extends Controller
{
    public function createLvl(Request $request){
        $lvl = ExpLvl::create($request->all());
        return response()->json($lvl);
    }

    public function updateLvl(Request $request, $id){
        $lvl  = ExpLvl::find($id);
        $lvl->make = $request->input('make');
        $lvl->save();
        return response()->json($lvl);
    }

    public function deleteLvl($id){
        $lvl  = ExpLvl::find($id);
        $lvl->delete();
        return response()->json('Removed successfully.');
    }

    public function index()
    {
        $lvl = ExpLvl::all();
        return response()->json($lvl);
    }
}