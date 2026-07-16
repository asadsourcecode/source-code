<?php

namespace App\Services\Teacher;

class MeetingDetailsService
{
    public function getData(): array
    {
        return [
            'days' => [
                [
                    'abbr'     => 'MON',
                    'date'     => '18',
                    'expanded' => true,
                    'summary'  => '3 Active Sessions',
                    'range'    => '08:30 AM — 03:00 PM',
                    'sessions' => [
                        ['time' => '08:30 AM - 9:30 AM', 'title' => 'Foundations of Character (G4)'],
                        ['time' => '08:30 AM - 9:30 AM', 'title' => 'Moral Dilemmas Workshop (G5)'],
                    ],
                ],
                [
                    'abbr'     => 'TUE',
                    'date'     => '19',
                    'expanded' => false,
                    'summary'  => '2 Active Sessions',
                    'range'    => '09:00 AM — 01:30 PM',
                    'sessions' => [],
                ],
                [
                    'abbr'     => 'WED',
                    'date'     => '20',
                    'expanded' => false,
                    'summary'  => '4 Active Sessions',
                    'range'    => '08:00 AM — 04:00 PM',
                    'sessions' => [],
                ],
                [
                    'abbr'     => 'THU',
                    'date'     => '21',
                    'expanded' => false,
                    'summary'  => '4 Active Sessions',
                    'range'    => '08:00 AM — 04:00 PM',
                    'sessions' => [],
                ],
                [
                    'abbr'     => 'FRI',
                    'date'     => '22',
                    'expanded' => false,
                    'summary'  => '4 Active Sessions',
                    'range'    => '08:00 AM — 04:00 PM',
                    'sessions' => [],
                ],
                [
                    'abbr'     => 'SAT',
                    'date'     => '23',
                    'expanded' => false,
                    'summary'  => '4 Active Sessions',
                    'range'    => '08:00 AM — 04:00 PM',
                    'sessions' => [],
                ],
                [
                    'abbr'     => 'SUN',
                    'date'     => '24',
                    'expanded' => false,
                    'summary'  => '4 Active Sessions',
                    'range'    => '08:00 AM — 04:00 PM',
                    'sessions' => [],
                ],
            ],
        ];
    }
}
