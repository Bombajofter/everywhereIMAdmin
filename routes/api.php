<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('user', [UserController::class, 'index']);
Route::get("user/{id}", [UserController::class, 'show']);
Route::get("user/token/{token}", [UserController::class, 'getIdWithToken']);
Route::get("user/{id}/kleuren", [UserController::class, 'kleuren']);
Route::post("user", [UserController::class, 'store']);
Route::delete("user/{id}", [UserController::class, 'delete']);
