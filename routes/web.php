<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート。

use App\Http\Controllers\TestController;

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

//rule page
Route::get('/posts/rule', [PostController::class, 'predict_rule']);

//predict_csv page
Route::get('/posts/etcpredict', [PostController::class, 'predict_csv']);

//python model
Route::post('/posts/python', [PostController::class, 'python']);