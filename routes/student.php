<?php

use App\Http\Controllers\Student\AssignmentFillController;
use App\Livewire\Student\Assignments;
use App\Livewire\Student\Announcements;
use App\Livewire\Student\Books;
use App\Livewire\Student\Dashboard;
use App\Livewire\Student\Profile;
use App\Livewire\Student\WeeklySchedule;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/books', Books::class)->name('books');
        Route::get('/profile', Profile::class)->name('profile');
        Route::get('/schedule', WeeklySchedule::class)->name('schedule');
        Route::get('/announcements', Announcements::class)->name('announcements');

        Route::get('/assignments', Assignments::class)->name('assignments.index');
        Route::get('/assignments/{assignment}', [AssignmentFillController::class, 'show'])->name('assignments.show');
        Route::patch('/assignments/{assignment}/answers', [AssignmentFillController::class, 'saveAnswer'])->name('assignments.answers');
        Route::post('/assignments/{assignment}/submit', [AssignmentFillController::class, 'submit'])->name('assignments.submit');
    });
