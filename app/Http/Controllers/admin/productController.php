<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
class productController extends Controller

{
    //
      public function store(Request $request)
    {



        $validate = Validator::make($request->all(),[
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',

        ]);
        if($validate->fails()){
           return response()->json([
                "success"=>false,
                "errors" =>$validate->errors()
            ],422);
        };



        if ($request->image){
            $image = $request->file("image");
            $image_name = time().'.'.$image->extension();
            $img = Image::make($request->image)->resize(300, 300);
            $img->save(public_path("image/").$image_name);
        }



        $product = new Product();
        $product->name = $request->name;
        $product->title = $request->title;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        if ($request->image) {
            $product->image =$image_name;
        }
        $product->save();

            foreach(json_decode($request->items) as $item){
                if($item->color_id != null && $item->size_id != null && $item->stock != null && $item->price != null ){
                     $attribute = new Attribute();
                    $attribute ->product_id = $product->id;
                    $attribute->color_id = $item->color_id;
                    $attribute->size_id = $item->size_id;
                    $attribute->stock = $item->stock;
                    $attribute->price = $item->price;
                    $attribute->save();

                }

            }





        return response()->json([
            "success"=> true
        ]);

    }

    // all product show

    public function index(){
        $product = Product::with(['category','subcategory','brand',])->get();
        return response()->json([
            "product"=>$product,
        ]);
    }

    // product eidt
    public function edit($id){
        $product = Product::with(['category','subcategory','brand',"attribute"])->where('id',$id)->first();
        return response()->json([
            "product"=>$product,
        ]);
    }
    // subcaegory show edit page
    public function subcategory($id){
        $product = Product::where('id',$id)->first();
        $subcategory = Subcategory::where("category_id",$product->category_id)->get();
        return response()->json([
            "subcategory"=>$subcategory,
        ]);
    }

    // product update
    public function update(Request $request,$id){

          $validate = Validator::make($request->all(),[
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',

        ]);
        if($validate->fails()){
           return response()->json([
                "success"=>false,
                "errors" =>$validate->errors()
            ],422);
        };
  
    //    return dd($request->all());
        $product = Product::where('id',$id)->first();
         if ($request->image != $product->image){
          $image = $request->file("image");
          $image_name = time().".".$image->extension();
          $image = Image::make($image)->resize(300,300);
          $image->save(public_path("image/").$image_name);
          if($product->image){
              unlink("image/".$product->image);
          }
        }

        $product->name = $request->name;
        $product->title = $request->title;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        if($request->image != $product->image){
            $product->image = $image_name;
        }
        $product->save();

             $deleteAtribute  =  Attribute::where("product_id",$id)->first();
                if($deleteAtribute){
                    $deleteAtribute->delete();
                }
            foreach(json_decode($request->items) as $item){
                if($item->color_id != null && $item->size_id != null && $item->stock != null && $item->price != null ){
                     $attribute = new Attribute();
                    $attribute ->product_id = $id;
                    $attribute->color_id = $item->color_id;
                    $attribute->size_id = $item->size_id;
                    $attribute->stock = $item->stock;
                    $attribute->price = $item->price;
                    $attribute->save();

                }

            }
         return response()->json([
            "product"=>$product,
        ]);

    }

    // product destroy
    public function destroy($id){
        $product = Product::find($id);
        if($product->image){
            unlink("image/".$product->image);
        }
        $product->delete();
         return response()->json([
            "product"=>$product,
        ]);
    }
    public function statu($id){
        $product = Product::where("id",$id)->first();
        if($product->statu ==1){
            $product->statu = 0;
            $product->save();
            return $product;
        }else{
             $product->statu = 1;
            $product->save();
            return $product;
        }
    }

}




