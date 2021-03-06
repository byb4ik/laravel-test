<?php

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

Route::get('/', function () {
    return view('start');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//create routes to categories
Route::resource('/category', 'App\Http\Controllers\CategoryController');
//create routes to article
Route::resource('/article', 'App\Http\Controllers\ArticleController');
//create routes to comment
Route::resource('/comment', 'App\Http\Controllers\CommentController');
