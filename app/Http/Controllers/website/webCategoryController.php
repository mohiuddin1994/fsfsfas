<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
}
