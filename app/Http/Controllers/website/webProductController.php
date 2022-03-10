<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class webProductController extends Controller
{

    public function index(){
        $products = Product::with(['category','subcategory','attribute.size','brand','attribute.color'])->get();
        return response()->json([
            "products"=>$products,
        ]);
    }

    public function singleIndex(){
          $product = Product::where('id',16)->with(['category','subcategory','attribute.size','brand','attribute.color'])->first();
         return response()->json([
              "product"=>$product,
        ]);
    }

    public function singleProduct($id){
          $product = Product::where('id',$id)->with(['category','subcategory','attribute.size','brand','attribute.color'])->first();
         return response()->json([
              "product"=>$product,
        ]);
    }
//  public function singleProduct($id){
//           $product = Product::where('id',$id)->with(['category','subcategory','brand'])->first();
//           $attribute = Attribute::where("product_id",$id)->with(['color','size'])->groupBy("color_id")->get();
//          return response()->json([
//               "product"=>$product,
//               "attribute"=>$attribute,
//         ]);
//     }

        public function colorWiseSize($color_id,$product_id){

            $attribute = Attribute::with(['size'])->where([["product_id",$product_id],["color_id",$color_id]]) ->get();
            return response()->json([
                "attribute"=>$attribute,
            ]);
        }

         public function sizeWisePrice($attribute_id,$size_id,$product_id){
            $attribute = Attribute::where("product_id",$product_id)->where("id",$attribute_id)->where("size_id",$size_id)->first();
            return response()->json([
                "attribute"=>$attribute,
            ]);


        }

}
