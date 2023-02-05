<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\PostController as PostIndex;
use App\Http\Controllers\Dashboard\CustomUIController;
use App\Http\Controllers\Dashboard\PermissionController;
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
Route::get('post',[PostIndex::class,'post'])->name('post.index');
Route::get('post/{post:slug}',[PostIndex::class,'post'])->name('post.detail');

Route::get('/page/{id}',[PageController::class,'pageFinder'])->name('page');

Auth::routes();
Route::middleware(['auth'])->name('dash.')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardIndexController::class,'index'])->name('index');
    // Post
    Route::resource('post', PostController::class);
    Route::patch('post/{id}/restore', [PostController::class,'restore'])->name('post.restore');
    Route::delete('post/{id}/delete-permanently', [PostController::class, 'forceDestroy'])->name('post.forceDelete');

    // Category 
    Route::resource('category-post', CategoryPostController::class);
    Route::patch('category-post/{id}/restore', [CategoryPostController::class, 'restore'])->name('category-post.restore');
    Route::delete('category-post/{id}/delete-permanently', [CategoryPostController::class, 'forceDestroy'])->name('category-post.forceDelete');
    
    // Tag
    Route::resource('tag',TagController::class);
    Route::patch('tag/{id}/restore', [TagController::class, 'restore'])->name('tag.restore');
    Route::delete('tag/{id}/delete-permanently', [TagController::class, 'forceDestroy'])->name('tag.forceDelete');
    
    // Custom UI
    Route::resource('cui',CustomUIController::class);
    Route::patch('cui/{id}/restore', [CustomUIController::class, 'restore'])->name('cui.restore');
    Route::delete('cui/{id}/delete-permanently', [CustomUIController::class, 'forceDestroy'])->name('cui.forceDelete');
    Route::get('cui/{id}/active',[CustomUIController::class, 'activationTheme'])->name('cui.active');
    // Partner
    Route::resource('tag',TagController::class);
    Route::patch('tag/{id}/restore', [TagController::class, 'restore'])->name('tag.restore');
    Route::delete('tag/{id}/delete-permanently', [CategoryPostController::class, 'forceDestroy'])->name('tag.forceDelete');
    
    // Banner
    Route::resource('tag',TagController::class);
    Route::patch('tag/{id}/restore', [TagController::class, 'restore'])->name('tag.restore');
    Route::delete('tag/{id}/delete-permanently', [CategoryPostController::class, 'forceDestroy'])->name('tag.forceDelete');
    
    
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});
