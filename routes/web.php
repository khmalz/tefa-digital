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

        Route::get('/form', function () {
            return view('photography.form');
        });
    });
});

Route::post('/contact-send', [SendMailController::class, 'sendMail'])->name('contact.send');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    });
});
