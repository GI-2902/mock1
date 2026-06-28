<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

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



//Route::post(login)の記述は必要ない
Route::middleware('auth')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::view('/profile', 'auth.profile');
    Route::get('/mypage', [ItemController::class, 'mypage']);
    Route::get('/mypage/profile', [UserController::class, 'index']);
    Route::post('/{tab=mylist}', [ItemController::class, 'search']);
    Route::get('/item/{item_id}', [ItemController::class, 'info']);
    Route::get('/item/{item_id}/like', [LikeController::class, 'like']);
    Route::post('/sell', [ItemController::class, 'store']);
    Route::get('/sell', [ItemController::class, 'register']);
});

Route::view('/profile', 'auth.profile');
