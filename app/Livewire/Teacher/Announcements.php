<?php

namespace App\Livewire\Teacher;

use App\Services\Teacher\AnnouncementService;
use Livewire\Component;

class Announcements extends Component
{
    public array $announcements = [];
    public array $pagination = [];

    public function mount(AnnouncementService $announcementService): void
    {
        $data = $announcementService->getData();

        $this->announcements = $data['announcements'];
        $this->pagination = $data['pagination'];
    }

    public function render()
    {
        return view('livewire.teacher.announcements')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Announcements | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
