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
    return view('welcome');
});

//Authentication
Route::group(['namespace' => 'Auth'], function() {
    Route::match(['get', 'post'], 'login',          [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::get( 'logout',                           [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

//Blog
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/blog',                             [\App\Http\Controllers\Blog\BlogController::class, 'index'])->name('index'); 
    Route::get('/{blog}',                           [\App\Http\Controllers\Blog\BlogController::class, 'show'])->name('show'); 
    Route::get('/create/blog',                      [\App\Http\Controllers\Blog\BlogController::class, 'create'])->name('create'); 
    Route::post('/create/blog',                     [\App\Http\Controllers\Blog\BlogController::class, 'store'])->name('store'); 
    Route::get('/{blog}/edit',                      [\App\Http\Controllers\Blog\BlogController::class, 'edit'])->name('edit'); 
    Route::put('/{blog}/edit',                      [\App\Http\Controllers\Blog\BlogController::class, 'update'])->name('update');  
    Route::delete('/{blog}',                        [\App\Http\Controllers\Blog\BlogController::class, 'destroy'])->name('delete'); 
});
