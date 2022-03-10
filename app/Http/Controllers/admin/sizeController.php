<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    //
     // store function
     public function store(Request $request){
        $size = Size::insert([
            'name'=>$request->name,
        ]);
        return response()->json([
            "size"=>$size,
        ]);
    }
    // index function
    public function index(){
        $size = Size::get();
        return response()->json([
            'size'=>$size,
        ]);
    }
    // edit function
    public function edit($id){
        $size = Size::find($id);
        return response()->json([
            "size"=>$size,
        ]);
    }
    // update function
    public function update(Request $request ,$id){
        $size = Size::find($id);
        $size->name = $request->name;
        $size->save();
        return $size;
    }

    // delete function
    public function delete($id){
        $size = Size::find($id);
        $size->delete();
        return $size;
    }
    // chnage function

    public function change($id){
        $size = Size::find($id);
        $statu = $size->statu;
        if($statu == 1){
            $size->statu =0;
            $size->save();
            return $size;
        }else{
            $size->statu =1;
            $size->save();
            return $size;
        }
    }
}
