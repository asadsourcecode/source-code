<?php

namespace App\Services\Teacher;

class WeeklyScheduleService
{
    public function getData(): array
    {
        return [
            'columns' => ['Monday', 'Tuesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'rows'    => [
                ['grade' => 'Grade 01', 'times' => array_fill(0, 6, '1:20 PM - 2:20 PM')],
                ['grade' => 'Grade 02', 'times' => array_fill(0, 6, '1:20 PM - 2:20 PM')],
                ['grade' => 'Grade 04', 'times' => array_fill(0, 6, '1:20 PM - 2:20 PM')],
            ],
        ];
    }
}
