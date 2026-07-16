<?php

use App\Livewire\Student\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
    });
