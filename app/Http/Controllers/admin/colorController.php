<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class colorController extends Controller
{
    //
     // store function
     public function store(Request $request){
        $color = Color::insert([
            'name'=>$request->name,
        ]);
        return response()->json([
            "color"=>$color,
        ]);
    }
    // index function
    public function index(){
        $color = Color::get();
        return response()->json([
            'color'=>$color,
        ]);
    }
    // edit function
    public function edit($id){
        $color = Color::find($id);
        return response()->json([
            "color"=>$color,
        ]);
    }
    // update function
    public function update(Request $request ,$id){
        $color = Color::find($id);
        $color->name = $request->name;
        $color->save();
        return $color;
    }

    // delete function
    public function delete($id){
        $color = Color::find($id);
        $color->delete();
        return $color;
    }
    // chnage function

    public function change($id){
        $color = Color::find($id);
        $statu = $color->statu;
        if($statu == 1){
            $color->statu =0;
            $color->save();
            return $color;
        }else{
            $color->statu =1;
            $color->save();
            return $color;
        }
    }
}
