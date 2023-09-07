<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\ItemController;
use App\Admin\Controllers\ParentCategoryController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\ReviewController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('item', ItemController::class);
    $router->resource('category', CategoryController::class);
    $router->resource('parent_category', ParentCategoryController::class);
    $router->resource('user', UserController::class);
    $router->resource('review', ReviewController::class);
});
