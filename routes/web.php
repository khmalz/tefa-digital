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

Route::get('/', function () {
    return view('index');
});

Route::as('user.')->group(function () {
    route::prefix('photography')->as('photography.')->group(function () {
        Route::get('/', function () {
            return view('photography.index');
        })->name('index');

        Route::get('/foto-produk', function () {
            return view('photography.foto-produk');
        })->name('foto-produk');


        Route::get('/foto-pernikahan', function () {
            return view('photography.foto-pernikahan');
        })->name('foto-pernikahan');

        Route::get('/foto-acara', function () {
            return view('photography.foto-acara');
        })->name('foto-acara');

        Route::get('/form', function () {
            return view('photography.form');
        })->name('form');
    });

    route::prefix('videography')->as('videography.')->group(function () {
        Route::get('/', function () {
            return view('videography.index');
        })->name('index');

        Route::get('/vid-syuting', function () {
            return view('videography.vid-syuting');
        })->name('vid-syuting');

        Route::get('/vid-dokumentasi', function () {
            return view('videography.vid-dokumentasi');
        })->name('vid-dokumentasi');

        Route::get('/form', function () {
            return view('videography.form');
        })->name('form');
    });

    route::prefix('design')->as('design.')->group(function () {
        Route::get('/', function () {
            return view('design.index');
        })->name('index');

        Route::get('/design-logo', function () {
            return view('design.design-logo');
        })->name('design-logo');

        Route::get('/design-promosi', function () {
            return view('design.design-promosi');
        })->name('design-promosi');

        Route::get('/design-3d', function () {
            return view('design.design-3d');
        })->name('design-3d');

        Route::get('/form', function () {
            return view('design.form');
        })->name('form');
    });

    route::prefix('printing')->as('printing.')->group(function () {
        Route::get('/', function () {
            return view('printing.index');
        })->name('index');

        Route::get('/form', function () {
            return view('printing.form');
        })->name('form');
    });
});

Route::post('/contact-send', [SendMailController::class, 'sendMail'])->name('contact.send');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    });
});
