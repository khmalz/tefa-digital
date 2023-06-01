<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Admin\PrintingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\DesignPlanController;
use App\Http\Controllers\Admin\PhotographyController;
use App\Http\Controllers\Admin\VideographyController;
use App\Http\Controllers\Admin\DesignCategoryController;
use App\Http\Controllers\Admin\PhotographyPlanController;
use App\Http\Controllers\Admin\VideographyPlanController;
use App\Http\Controllers\Admin\PhotographyCategoryController;
use App\Http\Controllers\Admin\VideographyCategoryController;

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
    Route::resource('portfolio', PortfolioController::class);

    Route::resource('design', DesignController::class);
    Route::resource('photography', PhotographyController::class);
    Route::resource('videography', VideographyController::class);
    Route::resource('printing', PrintingController::class);

    Route::resource('design-category', DesignCategoryController::class)->except('create', 'store', 'show', 'destroy');
    Route::resource('design-plan', DesignPlanController::class);

    Route::resource('photography-category', PhotographyCategoryController::class)->except('create', 'store', 'show', 'destroy');
    Route::resource('photography-plan', PhotographyPlanController::class);

    Route::resource('videography-category', VideographyCategoryController::class)->except('create', 'store', 'show', 'destroy');
    Route::resource('videography-plan', VideographyPlanController::class);
});
