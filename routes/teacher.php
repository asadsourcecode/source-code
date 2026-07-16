<?php

use App\Livewire\Teacher\AnnouncementCreate;
use App\Livewire\Teacher\Announcements;
use App\Livewire\Teacher\Dashboard;
use App\Livewire\Teacher\MeetingDetails;
use App\Livewire\Teacher\Profile;
use App\Livewire\Teacher\WeeklySchedule;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/meeting-details', MeetingDetails::class)->name('meeting-details');
        Route::get('/weekly-schedule', WeeklySchedule::class)->name('weekly-schedule');
        Route::get('/profile', Profile::class)->name('profile');
        Route::get('/announcements', Announcements::class)->name('announcements');
        Route::get('/announcements/create', AnnouncementCreate::class)->name('announcements.create');
    });
