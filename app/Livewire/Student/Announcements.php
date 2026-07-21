<?php

namespace App\Livewire\Student;

use App\Services\Student\AnnouncementService;
use Livewire\Component;

class Announcements extends Component
{
    public array $announcements = [];

    public function mount(AnnouncementService $announcementService): void
    {
        $this->announcements = $announcementService->getData()['announcements'];
    }

    public function render()
    {
        return view('livewire.student.announcements')
            ->extends('livewire.student.layouts.app', ['title' => 'Announcements | ICE Student Portal'])
            ->section('portal-content');
    }
}
