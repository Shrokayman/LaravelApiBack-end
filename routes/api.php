<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
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

///////////////////// Orders //////////////////////////////////////////

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
Route::post('/order', [OrderController::class, 'store']);


// Route::resource('orders', OrderController::class);

////////////////////////////////////////////////////////////////////////

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
});

Route::group(['middleware' => ['jwt.auth']], function () {

});

//////////////////////// User ///////////////////////////////

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

// Update user's data
Route::put('users/{id}', [UserController::class, "update"]);

// Show user by id
Route::get('users/{id}', [UserController::class, "show"]);
