<?php

namespace App\Livewire\Student;

use App\Services\Student\ProfileService;
use Livewire\Component;

class Profile extends Component
{
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $role = '';
    public string $phone = '';
    public string $whatsapp = '';
    public string $dob = '';
    public string $gender = '';
    public string $qualification = '';
    public string $profession = '';
    public string $country = '';
    public string $state = '';
    public string $city = '';
    public string $postalCode = '';

    public function mount(ProfileService $profileService): void
    {
        $data = $profileService->getData();

        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->email = $data['email'];
        $this->role = $data['role'];
        $this->phone = $data['phone'];
        $this->whatsapp = $data['whatsapp'];
        $this->dob = $data['dob'];
        $this->gender = $data['gender'];
        $this->qualification = $data['qualification'];
        $this->profession = $data['profession'];
        $this->country = $data['country'];
        $this->state = $data['state'];
        $this->city = $data['city'];
        $this->postalCode = $data['postalCode'];
    }

    public function render()
    {
        return view('livewire.student.profile')
            ->extends('livewire.student.layouts.app', ['title' => 'My Profile | ICE Student Portal'])
            ->section('portal-content');
    }
}
