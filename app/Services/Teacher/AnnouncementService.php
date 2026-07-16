<?php

namespace App\Services\Teacher;

class AnnouncementService
{
    public function getData(): array
    {
        return [
            'announcements' => [
                [
                    'title'     => 'Announcment for mobile',
                    'subject'   => 'CB Grade-3',
                    'fromDate'  => '21 Jun 2026',
                    'toDate'    => '28 Jun 2026',
                    'status'    => 'Active',
                ],
                [
                    'title'     => 'Announcement 02',
                    'subject'   => 'CB Grade-5',
                    'fromDate'  => '21 Jun 2026',
                    'toDate'    => '28 Jun 2026',
                    'status'    => 'Inactive',
                ],
                [
                    'title'     => 'Announcement 03',
                    'subject'   => 'CB Grade-7',
                    'fromDate'  => '21 Jun 2026',
                    'toDate'    => '28 Jun 2026',
                    'status'    => 'Active',
                ],
            ],
            'pagination' => [
                'from'  => 1,
                'to'    => 10,
                'total' => 56,
                'pages' => [1, 2, 3, 4, '...', 6],
                'current' => 1,
            ],
        ];
    }
}
