<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DesignFormController;
use App\Http\Controllers\DesignUserController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrderClientController;
use App\Http\Controllers\PrintingFormController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderListController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\PhotographyFormController;
use App\Http\Controllers\PhotographyUserController;
use App\Http\Controllers\VideographyFormController;
use App\Http\Controllers\VideographyUserController;
use App\Http\Controllers\Admin\DesignPlanController;
use App\Http\Controllers\Admin\DesignCategoryController;
use App\Http\Controllers\Admin\PhotographyPlanController;
use App\Http\Controllers\Admin\VideographyPlanController;
use App\Http\Controllers\Admin\PhotographyCategoryController;
use App\Http\Controllers\Admin\ProfileAppController;
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

// Public Routes (No Authentication Required)
Route::get('/', LandingPageController::class)->name('home');
Route::post('/contact-send', [SendMailController::class, 'sendMail'])->name('contact.send');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::controller(GoogleController::class)->group(function () {
        Route::get('auth/google', 'handleRedirect')->name('auth.google');
        Route::get('auth/google/callback', 'handleCallback');
    });
});

Route::as('user.')->group(function () {
    // Public Routes (No Authentication Required)
    Route::prefix('photography')->as('photography.')->group(function () {
        Route::get('/', [PhotographyUserController::class, 'index'])->name('index');
        Route::get('/foto-produk', [PhotographyUserController::class, 'produk'])->name('foto-produk');
        Route::get('/foto-pernikahan', [PhotographyUserController::class, 'pernikahan'])->name('foto-pernikahan');
        Route::get('/foto-acara', [PhotographyUserController::class, 'acara'])->name('foto-acara');
    });

    Route::prefix('videography')->as('videography.')->group(function () {
        Route::get('/', [VideographyUserController::class, 'index'])->name('index');
        Route::get('/vid-syuting', [VideographyUserController::class, 'syuting'])->name('vid-syuting');
        Route::get('/vid-dokumentasi', [VideographyUserController::class, 'dokumentasi'])->name('vid-dokumentasi');
    });

    Route::prefix('design')->as('design.')->group(function () {
        Route::get('/', [DesignUserController::class, 'index'])->name('index');
        Route::get('/design-logo', [DesignUserController::class, 'logo'])->name('design-logo');
        Route::get('/design-promosi', [DesignUserController::class, 'promosi'])->name('design-promosi');
        Route::get('/design-3d', [DesignUserController::class, 'threeD'])->name('design-3d');
    });

    Route::prefix('printing')->as('printing.')->group(function () {
        Route::view('/', 'printing.index')->name('index');
    });

    // Routes for Client (Authenticated Users)
    Route::middleware(['auth', 'role:client'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile-update', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/list-order', [OrderClientController::class, 'list'])->name('order.list');
        Route::get('/detail/{order}', [OrderClientController::class, 'show'])->name('order.show');

        Route::get('/edit/{order}/design', [OrderClientController::class, 'editDesign'])->name('order.design.edit');
        Route::patch('/update/{order}/design', [OrderClientController::class, 'updateDesign'])->name('order.design.update');
        Route::get('/edit/{order}/photography', [OrderClientController::class, 'editPhotography'])->name('order.photography.edit');
        Route::patch('/update/{order}/photography', [OrderClientController::class, 'updatePhotography'])->name('order.photography.update');

        Route::get('/edit/{order}/videography', [OrderClientController::class, 'editVideography'])->name('order.videography.edit');
        Route::patch('/update/{order}/videography', [OrderClientController::class, 'updateVideography'])->name('order.videography.update');

        Route::get('/activity', [ActivityController::class, 'index'])->name('order.activity.index');
        Route::post('activity/read/{notifications?}', [ActivityController::class, 'read'])->name('order.activity.read');

        Route::prefix('photography')->as('photography.')->group(function () {
            Route::get('/form', [PhotographyFormController::class, 'index'])->name('form.index');
            Route::post('/form', [PhotographyFormController::class, 'store'])->name('form.store');
            Route::get('/form-success/{nama}/{order}/{orderId}', [PhotographyFormController::class, 'success'])->name('form.success');
        });

        Route::prefix('videography')->as('videography.')->group(function () {
            Route::get('/form', [VideographyFormController::class, 'index'])->name('form.index');
            Route::post('/form', [VideographyFormController::class, 'store'])->name('form.store');
            Route::get('/form-success/{nama}/{order}/{orderId}', [VideographyFormController::class, 'success'])->name('form.success');
        });

        Route::prefix('design')->as('design.')->group(function () {
            Route::get('/form', [DesignFormController::class, 'index'])->name('form.index');
            Route::post('/form', [DesignFormController::class, 'store'])->name('form.store');
            Route::get('/form-success/{nama}/{order}/{orderId}', [DesignFormController::class, 'success'])->name('form.success');
        });

        Route::prefix('printing')->as('printing.')->group(function () {
            Route::get('/form', [PrintingFormController::class, 'index'])->name('form.index');
            Route::post('/form', [PrintingFormController::class, 'store'])->name('form.store');
            Route::get('/form-success/{nama}/{orderId}', [PrintingFormController::class, 'success'])->name('form.success');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('export-to-pdf')->as('print-pdf.')->group(function () {
        Route::get('design/{order}', [PDFController::class, 'createInvoiceDesign'])->name('design');
        Route::get('photography/{order}', [PDFController::class, 'createInvoicePhotography'])->name('photography');
        Route::get('videography/{order}', [PDFController::class, 'createInvoiceVideography'])->name('videography');
        Route::get('printing/{order}', [PDFController::class, 'createInvoicePrinting'])->name('printing');
    });
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('list-order', [OrderListController::class, 'all'])->name('order.all');
    Route::patch('order/{order}/update', [OrderListController::class, 'update'])->name('order.update');
    Route::get('detail/{order}', [OrderListController::class, 'show'])->name('order.show');

    Route::resource('portfolio', PortfolioController::class)->except('show');
    Route::get('profile-app', [ProfileAppController::class, 'index'])->name('profile-app.index');
    Route::patch('profil-app/contact/{contact}/update', [ProfileAppController::class, 'updateContact'])->name('profile-app.contact.update');
    Route::patch('profil-app/title/{title}/update', [ProfileAppController::class, 'updateTitle'])->name('profile-app.title.update');

    Route::resource('design-category', DesignCategoryController::class)->except('create', 'store', 'show', 'destroy');
    Route::resource('design-plan', DesignPlanController::class)->except('show');

    Route::resource('photography-category', PhotographyCategoryController::class)->except('create', 'store', 'show', 'destroy');
    Route::resource('photography-plan', PhotographyPlanController::class)->except('show');

    Route::resource('videography-category', VideographyCategoryController::class)->except('create', 'store', 'show', 'destroy');
    Route::resource('videography-plan', VideographyPlanController::class)->except('show');
});
