<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/methodology', [PageController::class, 'methodology'])->name('methodology');
Route::get('/new-subject', [PageController::class, 'newSubject'])->name('new-subject');

Route::get('/pages/{slug}', [PageController::class, 'show'])->name('page.show');
