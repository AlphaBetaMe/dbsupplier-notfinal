<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Frontend\AuthController;
use App\Http\Controllers\Api\Frontend\CartController;
use App\Http\Controllers\Api\Frontend\FrontendController;
use App\Http\Controllers\Api\Frontend\ProductController;
use App\Http\Controllers\Api\Frontend\CheckoutController;
use App\Http\Controllers\Api\Frontend\OrderController;
use App\Http\Controllers\Api\Frontend\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Log in and Register
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//Cart
Route::post('/addtocart',[CartController::class, 'addProdCart']);
Route::get('/viewCart' ,[CartController::class, 'viewCart']);
// Route::delete('/carts/{id}/products/{prod_id}', [CartController::class, 'removeProduct']);
Route::delete('/carts/{user_id}/{prod_id}', [CartController::class, 'removeProduct']);
//Products
Route::get('/products',[ProductController::class,'index']);

//Categories
Route::get('/products',[ProductController::class,'index']);

//myOrders
Route::get('myOrders',[OrderController::class, 'index']);
Route::get('viewmyOrder/{id}',[OrderController::class, 'view']);


//checkout
Route::post('placeOrder-details', [CheckoutController::class, 'placeOrder']);

//users
Route::get('/users', [UserController::class, 'index']);
// Restful routes
Route::group(['prefix' => 'v1', 'namespace'=>'App\Http\Controllers\Api\FrontEnd'], function(){
    Route::apiResource('frontend', FrontendController::class);
    Route::apiResource('cart', CartController::class);
});