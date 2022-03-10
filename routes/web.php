<?php

use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\colorController;
use App\Http\Controllers\admin\couponController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\sizeController;
use App\Http\Controllers\admin\subcategoryController;
use App\Http\Controllers\website\cartController;
use App\Http\Controllers\website\orderController;
use App\Http\Controllers\website\userController;
use App\Http\Controllers\website\webCategoryController;
use App\Http\Controllers\website\webProductController;
use App\Http\Controllers\website\webShopController;
use App\Http\Controllers\website\websiteController;
use App\Http\Controllers\website\wishListController;
use Illuminate\Support\Facades\Route;

use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// foronted route

Route::get("/",websiteController::class,"index");
Route::get("/dashboard",websiteController::class,"index");
Route::get("/userOrder",websiteController::class,"index");
Route::get("/userSetting",websiteController::class,"index");
Route::get("/userOrderCencel",websiteController::class,"index");
 Route::get("/login",websiteController::class,"index");
 Route::get("/register",websiteController::class,"index");
 Route::get("/shop",websiteController::class,"index");
 Route::get("/wishList",websiteController::class,"index");
 Route::get("/cart",websiteController::class,"index");
 Route::get("/checkout",websiteController::class,"index");


// user register logInUser

Route::get("/admin/dashboard",[dashboardController::class,"index"]);
Route::get("/admin",[dashboardController::class,"index"]);
Route::get("/categoryAdd",[dashboardController::class,"index"]);
Route::get("/categoryList",[dashboardController::class,"index"]);

Route::get("/subcategoryAdd",[dashboardController::class,"index"]);
Route::get("/subcategoryList",[dashboardController::class,"index"]);

Route::get("/brandAdd",[dashboardController::class,"index"]);
Route::get("/brandList",[dashboardController::class,"index"]);

Route::get("/sizeAdd",[dashboardController::class,"index"]);
Route::get("/sizeList",[dashboardController::class,"index"]);

Route::get("/colorAdd",[dashboardController::class,"index"]);
Route::get("/colorList",[dashboardController::class,"index"]);

Route::get("/productAdd",[dashboardController::class,"index"]);
Route::get("/productList",[dashboardController::class,"index"]);


Route::get("/coupon",[dashboardController::class,"index"]);
Route::get("/order",[dashboardController::class,"index"]);




// admin route


Route::get("/adminLogin",[dashboardController::class,"login"]);
Route::get("/adminLogOut",[dashboardController::class,"logOut"]);
Route::get("/adminUserGet",[dashboardController::class,"adminUser"]);
Route::get("/adminUser",[dashboardController::class,"admin"]);
//category route

Route::post("/categoryAdd",[categoryController::class,"store"]);
Route::get("/allCategory",[categoryController::class,"index"]);
Route::get("/categoryEdit/{id}",[categoryController::class,"edit"]);
Route::post("/categoryUpdate/{id}",[categoryController::class,"update"]);
Route::get("/categoryDelete/{id}",[categoryController::class,"delete"]);
Route::get("/categoryStatu/{id}",[categoryController::class,"change"]);
Route::get("/getCategorySearch/{category}",[categoryController::class,"search"]);
Route::post("checkAllDelete",[categoryController::class,"deleteAll"]);


// subcategory route
Route::post("/subcategoryAdd",[subcategoryController::class,"store"]);
Route::get("/allSubcategory",[subcategoryController::class,"index"]);
Route::get("/subcategoryEdit/{id}",[subcategoryController::class,"edit"]);
Route::post("/subcategoryUpdate/{id}",[subcategoryController::class,"update"]);
Route::get("/subcategoryDelete/{id}",[subcategoryController::class,"delete"]);
Route::get("/changeStatu/{id}",[subcategoryController::class,"change"]);
Route::get("/searchSubcategory/{subcategory}",[subcategoryController::class,"search"]);
Route::get("/categoryWiseSubcategory/{category}",[subcategoryController::class,"category"]);
Route::post("/selectedSubcategoryDelete/",[subcategoryController::class,"allDelete"]);
// brand route
Route::post("/brandAdd",[brandController::class,"store"]);
Route::get("/getBrand",[brandController::class,"index"]);
Route::get("/brandEdit/{id}",[brandController::class,"edit"]);
Route::post("/brandUpdate/{id}",[brandController::class,"update"]);
Route::get("/brandDelete/{id}",[brandController::class,"delete"]);
Route::get("/brandStatu/{id}",[brandController::class,"change"]);
Route::get("/searchBrand/{brand}",[brandController::class,"search"]);
// color route
Route::post("/colorAdd",[colorController::class,"store"]);
Route::get("/getColor",[colorController::class,"index"]);
Route::get("/colorEdit/{id}",[colorController::class,"edit"]);
Route::post("/colorUpdate/{id}",[colorController::class,"update"]);
Route::get("/colorDelete/{id}",[colorController::class,"delete"]);
Route::get("/colorStatu/{id}",[colorController::class,"change"]);
// size route
Route::post("/sizeAdd",[sizeController::class,"store"]);
Route::get("/getSize",[sizeController::class,"index"]);
Route::get("/sizeEdit/{id}",[sizeController::class,"edit"]);
Route::post("/sizeUpdate/{id}",[sizeController::class,"update"]);
Route::get("/sizeDelete/{id}",[sizeController::class,"delete"]);
Route::get("/sizeStatu/{id}",[sizeController::class,"change"]);
// product route
Route::post("/productSave",[productController::class,"store"]);
Route::get("/getProduct",[productController::class,"index"]);
Route::get("/productEdit/{id}",[productController::class,"edit"]);
Route::get("/editGetSubcategory/{id}",[productController::class,"subcategory"]);
Route::post("/productUpdate/{id}",[productController::class,"update"]);
Route::get("/deleteProduct/{id}",[productController::class,"destroy"]);
Route::get("/productStatu/{id}",[productController::class,"statu"]);


// coupon route

Route::post("/couponAdd",[couponController::class,"store"]);
Route::get("/couponList",[couponController::class,"couponIndex"]);
Route::get("/couponEdit/{id}",[couponController::class,"couponEdit"]);
Route::post("/couponUpdate/{id}",[couponController::class,"couponUpdate"]);
Route::get("/couponStatu/{id}",[couponController::class,"couponStatu"]);

//order
Route::get('/allOrder',[orderController::class,"index"]);
Route::post('/orderStatu',[orderController::class,"statuStore"]);
Route::get('/orderDetails/{id}',[orderController::class,"orderDetails"]);

/////////////////////////////////////////////////////////////////////////////////////
//frontend route

Route::post("/userRegister",[userController::class,"store"]);
Route::post("/userLogin",[userController::class,"loginUser"]);
Route::get("/getUser",[userController::class,"user"]);
Route::get("/user",[userController::class,"userLogIn"]);
Route::get("/userLogOut",[userController::class,"logOut"]);
Route::get("/getLogInUser",[userController::class,"getLogInUser"]);
Route::post("/userImageUpload",[userController::class,"image"]);
Route::post("/updateProfile",[userController::class,"update"]);
Route::post("/updatePassword",[userController::class,"updatePassword"]);


Route::get("/web/userOrder",[userController::class,"userOrder"]);
Route::get("/web/userOrderDetails/{id}",[userController::class,"orderDetails"]);


Route::get('/web/allProduct/',[webProductController::class,'index']);
Route::get('/web/singleProduct/',[webProductController::class,'singleIndex']);
Route::get('/web/quickView/{id}',[webProductController::class,'singleProduct']);
Route::get('/web/colroWiseSize/{color_id}/{product_id}',[webProductController::class,'colorWiseSize']);
Route::get('/web/sizeWisePrice/{attribute_id}/{size_id}/{product_id}',[webProductController::class,'sizeWisePrice']);

Route::get('/web/category/',[webCategoryController::class,'index']);
Route::get('/web/allColor/',[webShopController::class,'color']);
Route::get('/web/allSize/',[webShopController::class,'size']);
Route::get('/web/allBrand/',[webShopController::class,'brand']);
Route::get('/web/sideBarInfo/',[webShopController::class,'sideBarInfo']);
Route::get('/web/productFiler/{data}',[webShopController::class,'productFiler']);
Route::get('/web/quickViewProduct/{data}',[webShopController::class,'quickView']);
Route::get('/web/colroWiseSizeShop/{color_id}/{product_id}',[webShopController::class,'colorWiseSize']);
Route::get('/web/shopSizeWisePrice/{attribute_id}/{size_id}/{product_id}',[webShopController::class,'sizeWisePrice']);

// wishList route
Route::post("web/whshList",[wishListController::class,'store']);
Route::get("web/wishListAll",[wishListController::class,'index']);
Route::get("web/wishListRemove/{id}",[wishListController::class,'destroy']);

// add to cart route

Route::post("web/addToCart/",[cartController::class,'store']);
Route::get("web/cart/",[cartController::class,'index']);
Route::get("web/cartRemove/{id}",[cartController::class,'destory']);
Route::get("web/cartQuantyDec/{id}",[cartController::class,'decrement']);
Route::get("web/cartQuantyInc/{id}",[cartController::class,'increment']);
Route::get("web/couponApply/{data}",[cartController::class,'couponApply']);


Route::post("web/orderComplet/",[orderController::class,'store']);












