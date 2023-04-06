<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/books", [ApiBookController::class, 'index']);
Route::get("/books/show/{id}", [ApiBookController::class, 'show']);
//Authentication and registration
Route::post("/register", [ApiAuthController::class, 'handleRegister']);
Route::post('/login', [ApiAuthController::class, 'handleLogin']);
Route::post("/logout", [ApiAuthController::class, 'logout']);


Route::middleware('isApiUser')->group(function () {
    Route::post("/books/store", [ApiBookController::class, "store"]);
    Route::post("/books/update/{id}", [ApiBookController::class, "update"]);
    Route::get("/books/delete/{book:id}", [ApiBookController::class, "destroy"]);


});
