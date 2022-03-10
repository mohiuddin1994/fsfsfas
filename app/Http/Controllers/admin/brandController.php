<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
    //
     // store function
     public function store(Request $request){
        $brand = Brand::insert([
            'name'=>$request->name,
        ]);
        return response()->json([
            "brand"=>$brand,
        ]);
    }
    // index function
    public function index(){
        $brand = Brand::get();
        return response()->json([
            'brand'=>$brand
        ]);
    }
    // edit function
    public function edit($id){
        $brand = Brand::find($id);
        return response()->json([
            "brand"=>$brand,
        ]);
    }
    // update function
    public function update(Request $request ,$id){
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->save();
        return $brand;
    }

    // delete function
    public function delete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return $brand;
    }
    // chnage function

    public function change($id){
        $brand = Brand::find($id);
        $statu = $brand->statu;
        if($statu == 1){
            $brand->statu =0;
            $brand->save();
            return $brand;
        }else{
            $brand->statu =1;
            $brand->save();
            return $brand;
        }
    }

      // search brand
    public function search($brand){
        $brand = Brand::where("name","LIKE","%{$brand}%")->get();
        return response()->json([
            "brand"=>$brand,
        ]);
    }


}
