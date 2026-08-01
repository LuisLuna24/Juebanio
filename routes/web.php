<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('categories', CategoryController::class)->only('index', 'create', 'edit', 'destroy');
    Route::resource('seasons', SeasonController::class)->only('index', 'create', 'edit', 'destroy');
    Route::resource('components', ComponentController::class)->only('index', 'create', 'edit', 'destroy');
});

require __DIR__ . '/settings.php';
