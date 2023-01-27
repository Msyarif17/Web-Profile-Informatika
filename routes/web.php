<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\TagController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryPostController;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;

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

Route::get('/',[IndexController::class,'index'])->name('index');

Auth::routes();
Route::middleware(['auth'])->name('dash.')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardIndexController::class,'index']);
    // Route::resource('')
    Route::resource('post', PostController::class);
    Route::resource('category-post', CategoryPostController::class);
    Route::resource('tag',TagController::class);
});
