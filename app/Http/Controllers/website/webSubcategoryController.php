<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class webSubcategoryController extends Controller
{
    //
     public function subcategoryProduct($id){
        $subcategoryProduct = Product::where("subcategory_id",$id)->get();
         return response()->json([
            "subcategoryProduct"=> $subcategoryProduct,
        ]);
    }
}
