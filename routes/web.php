<?php

use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\PageController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\PostController as PostIndex;
use App\Http\Controllers\Dashboard\CustomUIController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\CategoryPostController;
use App\Http\Controllers\Dashboard\FeatureController;
use App\Http\Controllers\Dashboard\PageController as DPageController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('post', [PostIndex::class, 'post'])->name('post.index');
Route::get('post/{post:slug}', [PostIndex::class, 'post'])->name('post.detail');
Route::post('comment/{slug}', [CommentController::class, 'up'])->name('comment');
Route::get('page/{page:slug}', [PageController::class, 'pageFinder'])->name('page');

Auth::routes();
Route::middleware(['auth', 'can:access-dashboard','maintenace.mode'])->name('dash.')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardIndexController::class, 'index'])->name('index');
    // Post
    Route::middleware('can:read-post')->group(function(){
        Route::resource('post', PostController::class);
        Route::patch('post/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
        Route::delete('post/{id}/delete-permanently', [PostController::class, 'forceDestroy'])->name('post.forceDelete');
    });

    // Category 
    Route::middleware('can:read-post')->group(function(){

    });
    Route::middleware('can:read-category-post')->group(function () {
        Route::resource('category-post', CategoryPostController::class);
        Route::patch('category-post/{id}/restore', [CategoryPostController::class, 'restore'])->name('category-post.restore');
        Route::delete('category-post/{id}/delete-permanently', [CategoryPostController::class, 'forceDestroy'])->name('category-post.forceDelete');
    });

    // Tag
    Route::middleware('can:read-tag')->group(function(){

        Route::resource('tag', TagController::class);
        Route::patch('tag/{id}/restore', [TagController::class, 'restore'])->name('tag.restore');
        Route::delete('tag/{id}/delete-permanently', [TagController::class, 'forceDestroy'])->name('tag.forceDelete');
    });

    // Custom UI
    Route::middleware('can:access-theme-editor')->group(function(){
        Route::resource('cui', CustomUIController::class);
        Route::patch('cui/{id}/restore', [CustomUIController::class, 'restore'])->name('cui.restore');
        Route::delete('cui/{id}/delete-permanently', [CustomUIController::class, 'forceDestroy'])->name('cui.forceDelete');
        Route::get('cui/{id}/active', [CustomUIController::class, 'activationTheme'])->name('cui.active');
    });

    // Banner
    Route::middleware('can:read-banner')->group(function(){
        Route::resource('banner', BannerController::class);
        Route::patch('banner/{id}/restore', [BannerController::class, 'restore'])->name('banner.restore');
        Route::delete('banner/{id}/delete-permanently', [BannerController::class, 'forceDestroy'])->name('banner.forceDelete');
    });
    //Page
    Route::middleware('can:read-page')->group(function(){

        Route::resource('page', DPageController::class);
        Route::patch('page/{id}/restore', [DPageController::class, 'restore'])->name('page.restore');
        Route::delete('page/{id}/delete-permanently', [DPageController::class, 'forceDestroy'])->name('page.forceDelete');
    });
    Route::middleware('can:access-partner-maker')->group(function () {

        Route::resource('partner', PartnerController::class);
        Route::patch('partner/{id}/restore', [PartnerController::class, 'restore'])->name('partner.restore');
        Route::delete('partner/{id}/delete-permanently', [PartnerController::class, 'forceDestroy'])->name('partner.forceDelete');
    });
    //Menu
    Route::middleware('can:read-category-menu')->group(function(){

        Route::resource('menu', MenuController::class);
        Route::patch('menu/{id}/restore', [MenuController::class, 'restore'])->name('menu.restore');
        Route::delete('menu/{id}/delete-permanently', [MenuController::class, 'forceDestroy'])->name('menu.forceDelete');
    });
    //Users
    Route::middleware('can:read-user')->group(function(){

        Route::resource('users', UserController::class);
    });
    //ROLE
    Route::middleware('can:read-role')->group(function(){

        Route::resource('roles', RoleController::class);
    });
    //PERMISSION
    Route::middleware('can:read-permission')->group(function(){

        Route::resource('permissions', PermissionController::class);
        Route::patch('permissions/{id}/restore', [PermissionController::class, 'restore'])->name('permission.restore');
        Route::delete('permissions/{id}/delete-permanently', [PermissionController::class, 'forceDestroy'])->name('permission.forceDelete');
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });
    //Addtional Feature
    Route::get('maintenance/{refresh_time?}',[FeatureController::class, 'maintenance'])->name('maintenance');
});
