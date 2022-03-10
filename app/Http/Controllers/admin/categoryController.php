<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class categoryController extends Controller
{
    // store function
    public function store(Request $request)
    {
           $this->validate($request, [
            'name' => 'required',

        ]);
        $category = Category::insert([
            'name'=>$request->name,
        ]);
        return response()->json([
            "category"=>$category,
        ]);
    }
    // index function
    public function index()
    {
        $category = Category::get();
        return response()->json([
            'category'=>$category,
        ]);
    }
    // edit function
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json([
            "category"=>$category,
        ]);
    }
    // update function
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    // delete function
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $category;
    }
    // chnage function

    public function change($id)
    {
        $category = Category::find($id);
        $statu = $category->statu;
        if ($statu == 1) {
            $category->statu =0;
            $category->save();
            return $category;
        } else {
            $category->statu =1;
            $category->save();
            return $category;
        }
    }
    public function search($category){
        $category = Category::where("name","LIKE","%{$category}%")->get();
        return response()->json(
            [
                "category"=>$category,
            ]
            );
    }

    public function deleteAll(Request $request){

      foreach($request->all() as $item){
          Category::where("id",$item)->delete();
      }
      return ;


    }

}
