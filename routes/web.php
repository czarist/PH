<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;

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

Route::fallback(function () {
    return app()->make(\App\Http\Controllers\IndexController::class)->error404();
});

//general pages

Route::get('/', [IndexController::class, 'index']);
Route::get('/page/{page}', [IndexController::class, 'page']);

//video posts

Route::get('/video/{id}/{title}', [VideoController::class, 'index']);
