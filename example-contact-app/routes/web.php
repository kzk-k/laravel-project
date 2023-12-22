<?php

use App\Http\Controllers\ContactController;
use App\Http\Middleware\RegenerateToken;
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

Route::name('contact.')->controller(ContactController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('confirm', 'confirm')->name('confirm')->middleware(RegenerateToken::class);
    Route::post('complete', 'complete')->name('complete')->middleware(RegenerateToken::class);
});
