<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class subcategoryController extends Controller
{
    //

    // sub category store
    public function store(Request $request){
        $subcategory = Subcategory::insert([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
        ]);
        return response()->json([
            "subcategory"=>$subcategory,
        ]);
    }
    // sub category index
    public function index(){
        $subCategory = Subcategory::with("category")->get();
        return response()->json([
            'subCategory'=>$subCategory,
        ]);
    }
    // sub category edit
    public function edit($id){
        $subcategory = Subcategory::find($id);
        return response()->json([
            "subcategory"=>$subcategory,
        ]);
    }
    // sub category update
    public function update(Request $request ,$id){
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->save();
        return $subcategory;
    }

    // sub category delete
    public function delete($id){
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return $subcategory;
    }

    // change statu

     public function change($id){
         $subcategory = Subcategory::find($id);
         $statu = $subcategory->statu;
         if($statu == 1){
             $subcategory->statu = 0;
             $subcategory->save();
             return $subcategory;
         }else{
            $subcategory->statu = 1;
            $subcategory->save();
            return $subcategory;
         }

     }
     //search Subcategory

     public function search($subcategory){
         $subcategory = Subcategory::with(['category'])->where("name","LIKE","%{$subcategory}%")->get();
         return response()->json([
             "subCategory" =>$subcategory,
         ]);
     }
     public function category($id){
         $subcategory = Subcategory::where('category_id',$id)->get();
         return response()->json([
             "subCategory"=>$subcategory,
         ]);
     }
     // delete selected subcategory

     public function allDelete(Request $request){

        foreach($request->all() as $key => $value){
            $subcategory = Subcategory::where("id",$value)->delete();

        }
        return;

     }
}
