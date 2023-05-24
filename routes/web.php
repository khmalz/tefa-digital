<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Admin\PrintingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhotographyController;
use App\Http\Controllers\Admin\VideographyController;

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

Route::post('/contact-send', [SendMailController::class, 'sendMail'])->name('contact.send');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::view('order-list', 'admin.order.index')->name('order.index');

    Route::resource('design', DesignController::class);
    Route::resource('photography', PhotographyController::class);
    Route::resource('videography', VideographyController::class);
    Route::resource('printing', PrintingController::class);

    Route::view('design-category', 'admin.design.categories')->name('design.categories');
    Route::view('design-category-edit', 'admin.design.categories-edit')->name('design.categories-edit');
    Route::view('design-feature-edit', 'admin.design.feature-edit')->name('design.feature-edit');
    Route::view('design-plans-create', 'admin.design.plans-create')->name('design.plans-create');
    Route::view('design-plans-edit', 'admin.design.plans-edit')->name('design.plans-edit');
    Route::view('design-plans', 'admin.design.plans')->name('design.plans');
});
