<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSController;

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

Route::get('/', [CMSController::class, 'index'])->name("dashboard");
Route::get("/{id}/addKleur", [CMSController::class, "addKleur"]);
Route::get("{id}/changeKleur", [CMSController::class, "changeKleur"]);

Route::post("{id}/updateKleur", [CMSController::class, "updateKleur"]);
Route::delete("{id}/deleteKleur", [CMSController::class, "deleteKleur"]);
Route::get("/{id}/addKleur/{kleur}", [CMSController::class, "storeKleur"]);

