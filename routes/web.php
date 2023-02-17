<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;


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
Route::get('/search', [IndexController::class, 'search']);
Route::get('/random', [IndexController::class, 'random']);
Route::get('/categories', [IndexController::class, 'categories']);
Route::get('/pornstars/{page}', [IndexController::class, 'pornstars']);
Route::get('/pornstar/{cat}/page/{page}', [IndexController::class, 'pornstar']);
Route::get('/category/{cat}/page/{page}', [IndexController::class, 'category']);
Route::get('/tag/{cat}/page/{page}', [IndexController::class, 'category']);

//video posts

Route::get('/video/{id}/{title}', [VideoController::class, 'index']);

//sitemap
Route::get('/sitemap', [SitemapController::class, 'generate']);
