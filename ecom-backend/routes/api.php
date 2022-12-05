<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\ProductController;

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

Route::post('/register',[UsersController::class,'register']);
Route::post('/login',[UsersController::class,'login']);

Route::post('/addProduct',[ProductController::class,'addProduct']);
Route::get('/productList',[ProductController::class,'list']);
Route::delete('/delete/{id}',[ProductController::class,'delete']);
Route::get('/product/{id}',[ProductController::class,'getProduct']);
Route::post('/updateProduct/{id}',[ProductController::class,'updateProduct']);
