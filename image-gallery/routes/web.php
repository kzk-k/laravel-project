<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagelistController;
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
    return view('pages/welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::controller(HomeController::class)->name('admin.home.')->group(function () {
        Route::get('/admin/home', 'create')->name('create');
        Route::post('/admin/home', 'store')->name('store');
    });

    Route::controller(ImageListController::class)->name('admin.imageList.')->group(function () {
        Route::get('/admin/imagelist', 'create')->name('create');
        Route::post('/admin/imagelist', 'store')->name('store');
        Route::get('/admin/imagelist/{id}', 'edit')->name('edit');
        Route::put('/admin/imagelist/{id}', 'update')->name('update');
    });
});

Route::controller(AuthenticatedSessionController::class)->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('admin/login', 'create')->name('login');
        Route::post('admin/login', 'store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('admin/logout', 'destroy')->name('logout');
    });
});
