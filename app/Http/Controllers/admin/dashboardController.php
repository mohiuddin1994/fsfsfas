<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class dashboardController extends Controller
{
    //

    public function index(){
        return view("admin.adminMaster");
    }

    public function login(Request $request){
        Auth::attempt(['email' => $request->email, 'password' => $request-> password, "role"=>1]);

        $adminUser = Auth::user()->email;
         return response()->json([
            "adminUser" =>$adminUser,
        ]);
    }

    public function logOut(){
        $adminUser = Auth::logout();
        return response()->json([
            "adminUser" =>$adminUser,
        ]);

    }

    public function adminUser(){
        $adminUser = Auth::user();
        return response()->json([
            "adminUser" =>$adminUser,
        ]);
    }
    public function admin(){
        $adminUser = Auth::user()->email;
        return response()->json([
            "adminUser" =>$adminUser,
        ]);
    }



}
