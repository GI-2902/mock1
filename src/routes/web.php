<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ItemController::class, 'index']);

Route::post('/', [UserController::class, 'store']);

Route::get('/sell', [ItemController::class, 'register']);

Route::post('/sell', [ItemController::class, 'store']);

//Route::post(login)の記述は必要ない
Route::middleware('auth')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::view('/profile', 'auth.profile');
    Route::get('/mypage', [ItemController::class, 'mypage']);
});

Route::view('/profile', 'auth.profile');
