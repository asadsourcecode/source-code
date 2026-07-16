<?php

namespace App\Livewire\Teacher;

use App\Services\Teacher\WeeklyScheduleService;
use Livewire\Component;

class WeeklySchedule extends Component
{
    public array $columns = [];
    public array $rows = [];

    public function mount(WeeklyScheduleService $weeklyScheduleService): void
    {
        $data = $weeklyScheduleService->getData();

        $this->columns = $data['columns'];
        $this->rows = $data['rows'];
    }

    public function render()
    {
        return view('livewire.teacher.weekly-schedule')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Weekly Schedule | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
