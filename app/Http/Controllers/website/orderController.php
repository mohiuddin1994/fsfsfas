<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Order_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class orderController extends Controller
{
    //

    public function store(Request $request){

        $date =  date("Y/m/d");
        $cart = $request->cart;

        $user = json_encode($request->user);


        $user_id  = Auth::user()->id;
        $order = new Order();

        $order->user_id = $user_id;
        $order->invoice_no = rand(123456789,123456789);
        if($cart['subtotal'] && $cart['discount'] && $cart['total']){
            $order->subtotal = $cart['subtotal'];
            $order->discount = $cart['discount'];
            $order->total = $cart['total'];
        }else{
            $order->total = $cart['subtotal'];
        }
        $order-> orderDate = $date;
        $order-> statu = "panding";
        $order-> paymentType = $request->paymentType;
        $order->address = $user;
        $order->save();

            $cart_item = Cart::get();
            foreach($cart_item as $item){
                $order_item = new Order_item();
                $order_item ->order_id = $order->id;
                $order_item ->product_id = $item->product_id;
                $order_item ->attribute_id = $item->attribute_id;
                $order_item ->price = $item->price;
                $order_item ->quanty = $item->quanty;
                $order_item ->save();
            }
              foreach($cart_item as $item){
                $item->delete();
            }

            return response()->json([
                "order"=> true,
            ]);
    }

    // get all order
    public function index(){
        $orders = Order::with(['orderItem','user',"order_log"])->get();
        return response()->json([
            "order"=>$orders,

        ]);
    }

    // order statu log

    public function statuStore(Request $request){

              $order = $request->order;
        // return dd($request->statu["statu"]);

        $orderLog = Order_log::where([['order_id',$order["id"]],["invoice_no",$order["invoice_no"]]])->first();
        $order = Order::where("id",$order['id'])->where("invoice_no",$order['invoice_no'])->first();
        $order->statu = $request->statu['statu'];
        $order->save();
        if( $orderLog){

                $orderLog ->statu = $request->statu["statu"];
                $orderLog ->statu_date  = date("Y/m/d");
                $orderLog ->save();
                return response()->json([
                    "orderLog"=>$request->statu["statu"],
                ]);

            }else{

                 $orderLog = new Order_log();
                $orderLog ->order_id = $order["id"];
                $orderLog ->invoice_no = $order["invoice_no"];
                $orderLog ->order_date = $order['orderDate'];
                $orderLog ->statu = $request->statu["statu"];
                $orderLog ->statu_date  = date("Y/m/d");
                $orderLog ->save();
                return response()->json([
                    "orderLog"=>$request->statu["statu"]
                ]);
            }


    }
    // order details
    public function orderDetails($id){
        // $orderItem = Order_item::with(['product'])->where("order_id",$id)->first();
        $order = Order::with(['orderItem.product','user',"order_log",])->where("id",$id)->first();
        return response()->json([
            "order"=>$order,
        ]);
    }


}
