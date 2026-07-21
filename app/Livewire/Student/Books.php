<?php

namespace App\Livewire\Student;

use App\Services\Student\StudentDashboardService;
use Livewire\Component;

class Books extends Component
{
    public array $books = [];

    public function mount(StudentDashboardService $dashboardService): void
    {
        $this->books = $dashboardService->getData()['books'];
    }

    public function render()
    {
        return view('livewire.student.books')
            ->extends('livewire.student.layouts.app', ['title' => 'My Books | ICE Student Portal'])
            ->section('portal-content');
    }
}
