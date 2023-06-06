<?php

use App\Http\Controllers\SendMailController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    route::prefix('photography')->group(function () {
        Route::get('/', function () {
            return view('photography.index');
        });

        Route::get('/foto-produk', function () {
            return view('photography.foto-produk');
        });

        Route::get('/foto-acara', function () {
            return view('photography.foto-acara');
        });

        Route::get('/foto-pernikahan', function () {
            return view('photography.foto-pernikahan');
        });

        Route::get('/form', function () {
            return view('photography.form');
        });
    });

    route::prefix('videography')->group(function () {
        Route::get('/', function () {
            return view('videography.index');
        });

        Route::get('/vid-syuting', function () {
            return view('videography.vid-syuting');
        });

        Route::get('/vid-dokumentasi', function () {
            return view('videography.vid-dokumentasi');
        });

        Route::get('/form', function () {
            return view('videography.form');
        });
    });

    route::prefix('design')->group(function () {
        Route::get('/', function () {
            return view('design.index');
        });

        Route::get('/design-logo', function () {
            return view('design.design-logo');
        });

        Route::get('/design-promosi', function () {
            return view('design.design-promosi');
        });

        Route::get('/design-3d', function () {
            return view('design.design-3d');
        });

        Route::get('/form', function () {
            return view('design.form');
        });
    });
});

Route::post('/contact-send', [SendMailController::class, 'sendMail'])->name('contact.send');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    });
});
