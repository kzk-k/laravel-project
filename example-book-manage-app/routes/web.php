<?php

use App\Http\Controllers\BookManageController;
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

Route::name('bookManage.')->controller(BookManageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/genre/{genre}', 'genre')->name('genre');
    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');
    Route::get('{id}', 'show')->name('show');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('{id}/edit', 'update')->name('update');
    Route::delete('{id}', 'destroy')->name('destroy');
});
