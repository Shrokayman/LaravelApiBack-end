<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;

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



// Show All Users
Route::get('users' , [UserController::class , "index"]);


// Update user's data (Protected route : requires token)
Route::put('users/{id}' ,[UserController::class , "update"]);

// Show user by id (Protected route : requires token)
Route::get('users/{id}' , [UserController::class , "show"]);


// To get a new token after expiry of the token (Protected route : requires old token to renew it)
Route::get('refresh' ,[UserController::class , "refresh"] );
//

// Delete User
Route::delete('users/{id}' , [UserController::class , "destroy"]);


Route::get('/brands',[BrandController::class,'index']);
Route::post('/brands',[BrandController::class,'store']);
Route::delete('brands/{id}',[BrandController::class,'destroy']);
Route::get('/categories',[CategoryController::class,'index']);
Route::post('/categories',[CategoryController::class,'store']);
Route::delete('/categories/{id}',[CategoryController::class,'destroy']);

