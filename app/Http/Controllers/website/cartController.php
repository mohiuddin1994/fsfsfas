<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Attribute;
use App\Models\Coupon;
use App\Models\Product;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PhpParser\Node\Expr\FuncCall;

class cartController extends Controller
{
    //
    public function store(Request $request){ 

        // attribute product  add to cart
        if($request->attribute){
            $attribute = Attribute::where("id",$request->attribute['id'])->first();
            $attributeStock = $attribute->stock;
             //attribute stock check start
             if($request->quanty < $attributeStock){

                    $cartCheck = Cart::where("attribute_id",$request->attribute['id'])->first();
                        // cart attribute product check
                        if($cartCheck){
                                    // stock check start
                                $totalStock = $cartCheck->quanty + $request->quanty;
                                if($totalStock <= $attributeStock){
                                        $cartCheck->quanty += $request->quanty;
                                        $cartCheck->save();
                                        return response()->json([
                                            "quanty" => true,
                                        ]);

                                }else{
                                     // stock check end
                                     return response()->json([
                                            "stock" => true,
                                        ]);
                                }

                        }else{

                            //new attribute product add to cart
                             $cart = new Cart();
                            $cart->user_ip = request()->ip();
                            $cart->attribute_id = $request->attribute["id"];
                            $cart->product_id = $request->attribute["product_id"];
                            $cart->price = $request->attribute["price"];
                            $cart->quanty = $request->quanty;
                            $cart->save();
                            return response()->json([
                                "product"=>$cart
                            ]);
                        }


                }else{
                    //attribute stock check end
                    return response()->json([
                        "stock" => true,
                        ]);
                }



        }else{
            // product add to cart
             $product = Product::where("id",$request->product['id'])->first();
             $productStock = $product->stock;
                //product stock check start
              if($request->quanty < $productStock){

                         $cartCheck = Cart::where("product_id",$request->product['id'])->first();

                            // cart product check
                        if($cartCheck){
                                // request get quanty
                            if($request->quanty){
                                $totalStock = $cartCheck->quanty + $request->quanty;
                                // cart product stock check
                                if($totalStock <= $productStock){
                                    $cartCheck->quanty += $request->quanty;
                                       return response()->json([
                                        "quanty" => true,
                                        ]);
                                }else{
                                       return response()->json([
                                    "stock" => true,
                                    ]);
                                }


                            }else{
                                // not get quanty
                                  $totalStock = $cartCheck->quanty + 1;
                                // cart product stock check
                                if($totalStock <= $productStock){
                                    $cartCheck->quanty += 1;
                                       return response()->json([
                                        "quanty" => true,
                                        ]);
                                }else{
                                       return response()->json([
                                    "stock" => true,
                                    ]);
                                }

                            }

                            $cartCheck->save();
                        }else{
                            // new product add to cart
                             $cart = new Cart();
                            $cart->user_ip = request()->ip();
                            $cart->product_id = $request->product['id'];
                            $cart->price = $request->product['price'];
                                if($request->quanty){
                                    $cart->quanty = $request->quanty;
                                }else{
                                    $cart->quanty = 1;
                                }

                            $cart->save();
                            return response()->json([
                                "product"=>$cart
                            ]);
                         }


             }else{
                 //product stock check end
                   return response()->json([
                        "stock" => true,
                    ]);
             }


        }
    }

    public function index(){
        $cart = Cart::with(['product',"attribute.size","attribute.color"])->get();
        $price = $cart->sum(function($carts){
                return $carts->price * $carts->quanty ;
        });
        $quanty = $cart->sum(function($carts){
            return $carts->quanty;
        });
        return response()->json([
            "cart"=>$cart,
            "price"=>$price,
            "quanty"=>$quanty,


        ]);
    }

    // destory cart product
    public function destory($id){
        $cart = Cart::find($id)->delete();
        return response()->json([
            "cart"=>$cart,
        ]);
    }
    public function decrement($id){
        $cart = Cart::find($id);
        if($cart->quanty > 1){
            $cart->decrement("quanty");
            return response()->json([
                "cart"=>true,
            ]);
        }else{
            return response()->json([
                "cart"=>false,
            ]);
        }
    }
     public function increment($id){
        $cart = Cart::find($id);
        $attribute = Attribute::where("id",$cart->attribute_id)->first();
        $product = Product::where("id",$cart->product_id)->first();
        if($attribute){
            //stock check attribute product
            if($attribute->stock > $cart->quanty){
                  $cart->increment("quanty");
                    return response()->json([
                        "cart"=>true,
                    ]);
            }else{
                    return response()->json([
                        "stockOut"=>true,
                     ]);
            }

        }else if($product){
            if($product->stock > $cart->quanty){
                  $cart->increment("quanty");
                    return response()->json([
                        "cart"=>true,
                    ]);
            }else{
                    return response()->json([
                        "stockOut"=>true,
                     ]);
            }
        }


    }
    public function couponApply($data){
        $date = date("Y/m/d");

        $coupon = Coupon::where("name",$data)->where("expDate",">",$date)->first();

        return response()->Json([
            "coupon"=>$coupon,

        ]);

    }


}
