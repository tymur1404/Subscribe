<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){

    Route::resource('subscription', \App\Http\Controllers\Admin\SubscriptionController::class);
});

Route::resource('article', \App\Providers\ArticleController::class);
Route::resource('user', \App\Http\Controllers\UserController::class)->only(['show', 'edit', 'update']);

Route::get('/user/{user}/subscription', [\App\Http\Controllers\UserController::class, 'change_subscription'])->name('user.change_subscription');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
