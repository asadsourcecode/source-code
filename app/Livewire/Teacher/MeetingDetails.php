<?php

namespace App\Livewire\Teacher;

use App\Services\Teacher\MeetingDetailsService;
use Livewire\Component;

class MeetingDetails extends Component
{
    public array $days = [];

    public function mount(MeetingDetailsService $meetingDetailsService): void
    {
        $data = $meetingDetailsService->getData();

        $this->days = $data['days'];
    }

    public function render()
    {
        return view('livewire.teacher.meeting-details')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Meeting Details | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
