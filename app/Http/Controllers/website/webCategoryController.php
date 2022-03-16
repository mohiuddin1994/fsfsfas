<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class webCategoryController extends Controller
{
    //
    public function index(){
        $category = Category::with(['subcategory'])->get();
        return response()->json([
            "category"=> $category,
        ]);
    }
    // categoryProduct
    public function categoryProduct($id){
        $categoryProduct = Product::where("category_id",$id)->get();
         return response()->json([
            "categoryProduct"=> $categoryProduct,
        ]);
    }
}
