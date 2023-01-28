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
    Route::patch('post/{id}/restore', [PostController::class,'restore'])->name('post.restore');

    Route::resource('category-post', CategoryPostController::class);
    Route::patch('category-post/{id}/restore', [CategoryPostController::class, 'restore'])->name('category-post.restore');
    
    Route::resource('tag',TagController::class);
    Route::patch('tag/{id}/restore', [TagController::class, 'restore'])->name('tag.restore');

    Route::get('back',function(){
        return back();
    })->name('back');

});
