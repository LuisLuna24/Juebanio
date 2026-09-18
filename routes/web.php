<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/catalogo', 'catalogo')->name('catalogo');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('categories', CategoryController::class)->only('index');
    Route::resource('seasons', SeasonController::class)->only('index');
    Route::resource('components', ComponentController::class)->only('index');

    Route::resource('product-models', ProductModelController::class)->only('index');
});

require __DIR__ . '/settings.php';
