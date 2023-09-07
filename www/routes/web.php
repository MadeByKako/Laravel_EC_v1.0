<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MyPageController;

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

Auth::routes(['verify' => true]);

Route::controller(TopController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/search', 'search')->name('top.search');
});

Route::get('/show/{item}', [App\Http\Controllers\ItemController::class, 'show'])->name('item.show');
Route::post('/show', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart', 'store')->name('cart.store');
    Route::delete('/cart/end', 'destroy')->name('cart.destroy');
    Route::get('/cart/{id}', 'delete')->name('cart.delete');
    Route::put('/cart', 'update')->name('cart.update');
});

Route::controller(MyPageController::class)->group(function () {
    Route::get('/mypage/order_history', 'order_history')->name('mypage.order_history');
    Route::get('/mypage/order_history_show/{id}', 'order_history_show')->name('mypage.order_history_show');
});
