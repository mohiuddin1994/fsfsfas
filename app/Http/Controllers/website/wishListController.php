<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\WishList;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class wishListController extends Controller
{

    //
    public function store(Request $request){


         $checkWishList = WishList::where([['user_Id',$request->user_id],["product_id",$request->product_id]])->first();
        if (!$checkWishList) {
            if ($request->attribute != null) {
                $attributes = Attribute::where("product_id", $request->product_id)->get();
                foreach ($attributes as $attribute) {
                    $wishList = new WishList();
                    $wishList->user_id = $request->user_id;
                    $wishList->product_id = $request->product_id;
                    $wishList->attribute_id = $attribute->id;
                    $wishList->save();
                }
                    return response()->json([
                        "wishList" =>$wishList,
                        "success" => true,
                    ]);
            } else {
                $wishList = new WishList();

                $wishList->user_id = $request->user_id;
                $wishList->product_id = $request->product_id;
                $wishList->save();
                return response()->json([
                    "wishList" =>$wishList,
                    "success" => true,
                ]);
            }
        }else{
             $wishList = new WishList();
                 return response()->json([
                    "wishList" =>$wishList,
                    "success" => false,
                ]);
        }

    }

    public Function index(){
        $wishList = WishList::with(['product',"attribute.color","attribute.size"])->get();
        return response()->json([
            "wishList" => $wishList,
        ]);
    }
    public function destroy($id){
        $wishList = WishList::find($id)->delete();
        return response()->json([
            "wishList"=>$wishList
        ]);
    }
}
