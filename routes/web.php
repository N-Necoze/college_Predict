<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート。

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

//home
Route::get('/', [PostController::class, 'predict_home']);

//Python model
Route::get('/posts/python/predict', [PostController::class, 'kuchikomi_csv_download']);

//rule page
Route::get('/posts/rule', [PostController::class, 'predict_rule']);