<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;


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

Route::post('register' , [UserController::class , 'register']);
Route::post('login' , [UserController::class , 'login']);

// Update user's data
Route::put('users/{id}' ,[UserController::class , "update"]);

// Show user by id
Route::get('users/{id}' , [UserController::class , "show"]);



////////////////////////////////////////////////////
//                  Products                      //
////////////////////////////////////////////////////

// List
Route::get('/products', [ProductController::class,'index']);

// Create 
// Route::get('/products/create', [ProductController::class,'create']);

// Store
Route::post('/products', [ProductController::class,'store']);

// Show
Route::get('/products/{id}',[ProductController::class,'show']);

// Update
Route::put('/products/{id}',[ProductController::class,'update']);

// Delete
Route::delete('/products/{id}',[ProductController::class,'destroy']);


