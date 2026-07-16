<?php

namespace App\Livewire\Student;

use App\Services\Student\StudentDashboardService;
use Livewire\Component;

class Dashboard extends Component
{
    public array $data = [];

    public function mount(StudentDashboardService $dashboardService): void
    {
        $this->data = $dashboardService->getData();
    }

    public function render()
    {
        return view('livewire.student.dashboard')
            ->extends('livewire.student.layouts.app', ['title' => 'Dashboard | ICE Student Portal'])
            ->section('portal-content');
    }
}
