<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\DesignFormController;
use App\Http\Controllers\DesignUserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PrintingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\PhotographyFormController;
use App\Http\Controllers\PhotographyUserController;
use App\Http\Controllers\VideographyFormController;
use App\Http\Controllers\VideographyUserController;
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

Route::get('/', LandingPageController::class);

Route::as('user.')->group(function () {
    route::prefix('photography')->as('photography.')->group(function () {
        Route::get('/', [PhotographyUserController::class, 'index'])->name('index');

        Route::get('/foto-produk', [PhotographyUserController::class, 'produk'])->name('foto-produk');

        Route::get('/foto-pernikahan', [PhotographyUserController::class, 'pernikahan'])->name('foto-pernikahan');

        Route::get('/foto-acara', [PhotographyUserController::class, 'acara'])->name('foto-acara');

        Route::get('/form', [PhotographyFormController::class, 'index'])->name('form.index');
        Route::post('/form', [PhotographyFormController::class, 'store'])->name('form.store');
        Route::get('/form-success/{nama}/{order}/{orderId}', [PhotographyFormController::class, 'success'])->name('form.success');
    });

    route::prefix('videography')->as('videography.')->group(function () {
        Route::get('/', [VideographyUserController::class, 'index'])->name('index');

        Route::get('/vid-syuting', [VideographyUserController::class, 'syuting'])->name('vid-syuting');

        Route::get('/vid-dokumentasi', [VideographyUserController::class, 'dokumentasi'])->name('vid-dokumentasi');

        Route::get('/form', [VideographyFormController::class, 'index'])->name('form.index');
        Route::post('/form', [VideographyFormController::class, 'store'])->name('form.store');
        Route::get('/form-success/{nama}/{order}/{orderId}', [VideographyFormController::class, 'success'])->name('form.success');
    });

    route::prefix('design')->as('design.')->group(function () {
        Route::get('/', [DesignUserController::class, 'index'])->name('index');

        Route::get('/design-logo', [DesignUserController::class, 'logo'])->name('design-logo');

        Route::get('/design-promosi', [DesignUserController::class, 'promosi'])->name('design-promosi');

        Route::get('/design-3d', [DesignUserController::class, 'threeD'])->name('design-3d');

        Route::get('/form', [DesignFormController::class, 'index'])->name('form.index');
        Route::post('/form', [DesignFormController::class, 'store'])->name('form.store');
        Route::get('/form-success/{nama}/{order}/{orderId}', [DesignFormController::class, 'success'])->name('form.success');
    });

    route::prefix('printing')->as('printing.')->group(function () {
        Route::view('/', 'printing.index')->name('index');

        Route::get('/form', function () {
            return view('printing.form');
        })->name('form');
    });
});

Route::post('/contact-send', [SendMailController::class, 'sendMail'])->name('contact.send');

Route::middleware('guest')->prefix('login')->as('login.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/', [LoginController::class, 'login'])->name('store');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::view('order-list', 'admin.order.index')->name('order.index');
    Route::prefix('export-to-pdf')->group(function () {
        Route::get('design/{design}', [PDFController::class, 'exportDesign']);
        Route::get('photography/{photography}', [PDFController::class, 'exportPhotography']);
        Route::get('videography/{videography}', [PDFController::class, 'exportVideography']);
        Route::get('printing/{printing}', [PDFController::class, 'exportPrinting']);
    });
    Route::resource('portfolio', PortfolioController::class)->except('show');
    Route::resource('contact', ContactController::class)->except('create', 'store', 'show', 'destroy');

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
