<?php

namespace App\Services\Student;

class WeeklyScheduleService
{
    public function getData(): array
    {
        return [
            'columns' => ['Monday', 'Tuesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'rows'    => [
                ['subject' => 'Subject 01', 'times' => array_fill(0, 6, '1:20 PM - 2:20 PM')],
                ['subject' => 'Subject 02', 'times' => array_fill(0, 6, '1:20 PM - 2:20 PM')],
                ['subject' => 'Subject 03', 'times' => array_fill(0, 6, '1:20 PM - 2:20 PM')],
            ],
        ];
    }
}
