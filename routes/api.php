<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


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


// Update user's data (Protected route : requires token)

// Show All Users
Route::get('users' , [UserController::class , "index"]);
// Update user's data

Route::put('users/{id}' ,[UserController::class , "update"]);

// Show user by id (Protected route : requires token)
Route::get('users/{id}' , [UserController::class , "show"]);


// To get a new token after expiry of the token (Protected route : requires old token to renew it)
Route::get('refresh' ,[UserController::class , "refresh"] );
//

// Delete User
Route::delete('users/{id}' , [UserController::class , "destroy"]);

