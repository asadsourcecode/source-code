<?php

use App\Http\Controllers\Teacher\ExerciseBuilderController;
use App\Livewire\Teacher\AnnouncementCreate;
use App\Livewire\Teacher\Announcements;
use App\Livewire\Teacher\AssignmentCreate;
use App\Livewire\Teacher\Assignments;
use App\Livewire\Teacher\AssignmentSubmissions;
use App\Livewire\Teacher\Dashboard;
use App\Livewire\Teacher\MeetingDetails;
use App\Livewire\Teacher\Profile;
use App\Livewire\Teacher\Students;
use App\Livewire\Teacher\WeeklySchedule;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/meeting-details', MeetingDetails::class)->name('meeting-details');
        Route::get('/weekly-schedule', WeeklySchedule::class)->name('weekly-schedule');
        Route::get('/students', Students::class)->name('students');
        Route::get('/profile', Profile::class)->name('profile');
        Route::get('/announcements', Announcements::class)->name('announcements');
        Route::get('/announcements/create', AnnouncementCreate::class)->name('announcements.create');

        Route::get('/books/{product:slug}/builder', [ExerciseBuilderController::class, 'show'])->name('books.builder');
        Route::post('/exercise-fields/{product}', [ExerciseBuilderController::class, 'store'])->name('exercise-fields.store');
        Route::patch('/exercise-fields/{field}', [ExerciseBuilderController::class, 'update'])->name('exercise-fields.update');
        Route::delete('/exercise-fields/{field}', [ExerciseBuilderController::class, 'destroy'])->name('exercise-fields.destroy');

        Route::get('/assignments', Assignments::class)->name('assignments.index');
        Route::get('/assignments/create', AssignmentCreate::class)->name('assignments.create');
        Route::get('/assignments/{assignment}/submissions', AssignmentSubmissions::class)->name('assignments.submissions');
    });
