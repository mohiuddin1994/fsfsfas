<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class couponController extends Controller
{
    //

    public function store(Request $request){

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->expDate = $request->expDate;
        $coupon->discount = $request->discount;
        $coupon->save();
        return response()->json([
            "coupon"=>$coupon,
        ]);
    }
    public function couponIndex(){
        $coupon = Coupon::get();
        return response()->json([
            "coupon"=>$coupon,
        ]);
    }

    public function couponEdit($id){
        $coupon = Coupon::where("id",$id)->first();
        return response()->json([
            "coupon"=>$coupon,
        ]);
    }
     public function couponUpdate(Request $request, $id){

        $coupon = Coupon::where("id",$id)->first();
        $coupon->name = $request->name;
        $coupon->expDate = $request->expDate;
        $coupon->discount = $request->discount;
        $coupon->save();
        return response()->json([
            "coupon"=>$coupon,
        ]);
    }
    public function couponStatu($id){
        $coupon = Coupon::where("id",$id)->first();
        if($coupon->statu == 1){
            $coupon->statu = 0;
            $coupon->save();
            return response()->json([
            "unActive"=>true,
        ]);
        } else if($coupon->statu ==0){
             $coupon->statu = 1;
            $coupon->save();
            return response()->json([
            "active"=>true,
        ]);
        }


    }
}
