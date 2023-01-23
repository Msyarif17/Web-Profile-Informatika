<?php

use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\IndexController;

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
Route::middleware(['auth'])->name('dash')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardIndexController::class,'index']);
    // Route::resource('')
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
