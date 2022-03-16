<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderCencel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //

    public function store(Request $request){

       $validated = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if($validated->fails()){
            return response()->json([
                "errors"=>$validated->errors(),
            ],422);
        };
        if($request->password === $request->confirm_password){
           $user = new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->save();
           $userRe = $user;
            return response()->json([
              "user"=>$userRe,
          ]);
        }else{
            return response()->json([
                "password" => "password and confirm password not match",
            ],422);
        }

    }

    public function loginUser(Request $request){

        $validated = Validator::make($request->all(),[
            "email"=>"required",
            "password" =>"required",
        ]);
            if($validated->fails()){
                return response()->json([
                    "errors"=>$validated->errors(),
                ],422);
            }

          $user = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
          if($user == true){
              $loginUser = Auth::user();
              return response()->json([
              "user"=>$loginUser,
             ]);
          }else{
              return response()->json([
              "user"=>false,
             ]);
          }

    }


        public function user(){
            $user = Auth::user();
             return response()->json([
                 "user"=>$user,
             ]);
        }
        public function userLogIn(){
            $user = Auth::user();
             return response()->json([
                 "user"=>$user,
             ]);
        }



        public function logOut(){
            $user= Auth::logout();
            return response()->json([
                "user"=>$user,
            ]);
        }

        public function getLogInUser(){
            $user = Auth::user();
             return response()->json([
                 "user"=>$user,
             ]);
        }

        // user image upload

       public function image(Request $request){
           $auth = Auth::user();
           if($request->image){
                if($auth->image != $request->image && $auth->image != null){
                     if($auth->image){
                         unlink("profile/".$auth->image);
                     }
                     $image = $request->image;
                    $image_name = time().".".$image->extension();
                    $img = Image::make($request->image)->resize(300,300);
                    $img->save(public_path("profile/").$image_name);


                }else{
                    $image = $request->image;
                    $image_name = time().".".$image->extension();
                    $img = Image::make($request->image)->resize(300,300);
                    $img->save(public_path("profile/").$image_name);

                }

           }

                    $user  = User::where("id",$auth->id)->first();
                    $user->image = $image_name;
                    $user->save();
                    return response()->json([
                        'user'=>$user,
                    ]);



     }
     // update profile

     public function update(Request $request){
         $authId = Auth::user()->id;
         $user  = User::where("id",$authId)->first();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->address = $request->address;
         $user->country = $request->country;
         $user->state = $request->state;
         $user->city = $request->city;
         $user->zeep_code = $request->zeep_code;
         $user->save();
         return response()->json([
             "user"=>$user,
         ]);


     }

     // password update user

     public function updatePassword(Request $request){

        $auth  = Auth::user();



        $checkPassword = Hash::check($request->oldPassword, $auth->password);
        if($checkPassword){
                    if($request->newPassword === $request->confirmPassword){
                        $user = User::where("id",$auth->id)->first();
                       $user->password = Hash::make($request->newPassword);
                        $user->save();

                         return  response()->json([
                            "password"=>true,
                         ]);
                    }else{
                        return  response()->json([
                            "match"=>false,
                        ]);
                    }
        }else{
             return  response()->json([
                "password"=>false,
             ]);
        }

     }

     public function userOrder(){
         $auth = Auth::user();
         $order = Order::with(['user'])->where("user_id",$auth->id)->get();
         return response()->json([
             "order"=>$order,
         ]);
     }
     public function orderDetails($id){
        // $orderItem = Order_item::with(['product'])->where("order_id",$id)->first();
        $order = Order::with(['orderItem.product','user',"order_log",])->where("id",$id)->first();
        return response()->json([
            "order"=>$order,
        ]);
     }
     // order cencel
     public function orderCencel($id){
         $date = date("Y/m/d");
         $orderCencel =new OrderCencel();
         $orderCencel ->user_id = Auth::user()->id;
         $orderCencel ->order_id = $id;
         $orderCencel ->apllie_date = $date;
         $orderCencel ->statu = "pending";
         $orderCencel->save();
         return response()->json([
             "orderCencel" => $orderCencel,
         ]);
     }
    //  user order cencele index
      public function userOrderCencelIndex(){

        $auth = Auth::user();
        $userOrderCencel = OrderCencel::with(['user',"order"])->where("user_id",$auth->id)->get();
         return response()->json([
             "userOrderCencel" => $userOrderCencel,
         ]);
     }
    //  re order user
    public function reorder($id){
        $userOrderCencel = OrderCencel::where("id",$id)->delete();
          return response()->json([
             "userOrderCencel" => $userOrderCencel,
         ]);
    }


}
