<?php

namespace App\Livewire\Teacher;

use Livewire\Component;

class AnnouncementCreate extends Component
{
    public function render()
    {
        return view('livewire.teacher.announcement-create')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Create New Announcement | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
