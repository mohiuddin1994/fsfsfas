<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

use Illuminate\Http\Request;

class webShopController extends Controller
{
    //
    public function color(){
        $colors = Color::all();
        return response()->json([
            'colors'=>$colors,
        ]);
    }
     public function size(){
        $sizes = Size::all();
        return response()->json([
            'sizes'=>$sizes,
        ]);
    }
     public function brand(){
        $brands = Brand::all();
        return response()->json([
            'brands'=>$brands,
        ]);
    }

     public function sideBarInfo(){
        $min_price = Product::min("price");
        $max_price = Product::max("price");
        return response()->json([
            'price'=>[
                "min" =>$min_price,
                "max" =>$max_price,
            ]
        ]);
    }
    public function productFiler($data){


        $data = json_decode($data);

        if($data->field_name == 'price'){
             $minPrice = $data->minPrice;
             $price = $data->price;
             $field_name = $data->field_name;
            $products = Product::whereBetween($field_name,[$minPrice, $price])->get();

        }
        else if($data->field_name == "size_id" || $data->field_name == "color_id"){
            $id = $data->id;
            $field_name = $data->field_name;
             $products = Attribute::where($field_name,$id)->get();

        }

        else{
             $id = $data->id;
            $field_name = $data->field_name;
             $products = Product::where($field_name,$id)->get();

        }


        //     return $data;
        //  $id = $data->id;
        //  $field_name = $data->field_name;

        //  if($field_name == 'size_id' || $field_name=="color_id"){
        //       $products = $this->sizeColorFilter($id,$field_name);
        //  }else if($field_name =="price"){
        //      $price = $data->price;
        //      $field_name = $data->field_name;
        //      $products = $this-> priceFileter($price,$field_name);
        //  }

        //  else{
        //      $products = Product::where($field_name,$id)->get();
        //  }



          return response()->json([
            "products"=>$products,
        ]);
    }

     public function quickView($id){
        $product = Product::where("id",$id)->first();
          $attribute = Attribute::where("product_id",$id)->with(['color','size'])->groupBy("color_id")->get();
        return response()->json([
                "product" =>$product,
                "attribute" =>$attribute,



        ]);
    }

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
