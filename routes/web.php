<?php

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

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function () {
    Route::view('dashboard', 'admin.dashboard.index')->name('admin.dashboard');
    Route::view('order-list', 'admin.order.index')->name('order.index');
    Route::view('design-category', 'admin.design.categories')->name('design.categories');
    Route::view('design-category-edit', 'admin.design.categories-edit')->name('design.categories-edit');
    Route::view('design-feature-edit', 'admin.design.feature-edit')->name('design.feature-edit');
    Route::view('design-plans-create', 'admin.design.plans-create')->name('design.plans-create');
    Route::view('design-plans-edit', 'admin.design.plans-edit')->name('design.plans-edit');
    Route::view('design-plans', 'admin.design.plans')->name('design.plans');
});
