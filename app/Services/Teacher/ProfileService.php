<?php

namespace App\Services\Teacher;

use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function getData(): array
    {
        $user = Auth::user();
        $nameParts = explode(' ', $user->name ?? '', 2);

        return [
            'firstName'     => $nameParts[0] ?? '',
            'lastName'      => $nameParts[1] ?? '',
            'email'         => $user->email ?? '',
            'role'          => 'Lead Educator',
            'phone'         => '+92 3376549980',
            'whatsapp'      => '+92 8843765677',
            'dob'           => '',
            'gender'        => 'Female',
            'qualification' => 'Other',
            'profession'    => 'Other',
            'country'       => 'Pakistan',
            'state'         => 'Punjab',
            'city'          => 'Rawalpindi',
            'postalCode'    => '46000',
        ];
    }
}
