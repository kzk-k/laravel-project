<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TodoController;
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

Route::controller(TodoController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('', 'store')->name('store');
    Route::get('{id}', 'show')->name('show');
    Route::delete('{id}', 'destroy')->name('destroy');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('{id}/edit', 'update')->name('update');
});

// Route::resource('/', TodoController::class);
