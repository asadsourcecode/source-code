<?php

namespace App\Livewire\Student;

use App\Services\Student\WeeklyScheduleService;
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
        return view('livewire.student.weekly-schedule')
            ->extends('livewire.student.layouts.app', ['title' => 'Weekly Schedule | ICE Student Portal'])
            ->section('portal-content');
    }
}
