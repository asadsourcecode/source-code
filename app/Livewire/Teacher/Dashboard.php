<?php

namespace App\Livewire\Teacher;

use App\Services\Teacher\TeacherDashboardService;
use Livewire\Component;

class Dashboard extends Component
{
    public array $stats = [];
    public array $recentActivity = [];

    public function mount(TeacherDashboardService $dashboardService): void
    {
        $data = $dashboardService->getData();

        $this->stats = $data['stats'];
        $this->recentActivity = $data['recent_activity'];
    }

    public function render()
    {
        return view('livewire.teacher.dashboard')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Dashboard | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
