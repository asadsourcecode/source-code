<?php

namespace App\Services\Student;

class AnnouncementService
{
    public function getData(): array
    {
        return [
            'announcements' => [
                [
                    'date'        => '7 July 2026',
                    'emoji'       => '🌙',
                    'title'       => 'Eid-ul-Adha Holidays',
                    'description' => "Please be informed that all online classes and school activities will remain suspended from 2nd Jun, 2026 to 6th Jun, 2026 in observance of Eid-ul-Adha.\n\nRegular classes will resume on 7th Jun, 2026\n\nWishing all our students, teachers, and families a joyful, peaceful, and blessed Eid Mubarak! ✨",
                ],
                [
                    'date'        => '7 July 2026',
                    'emoji'       => '📖',
                    'title'       => 'Exams Week',
                    'description' => "Please be informed that all online classes and school activities will remain suspended from 2nd Jun, 2026 to 6th Jun, 2026 in observance of Eid-ul-Adha.\n\nRegular classes will resume on 7th Jun, 2026\n\nWishing all our students, teachers, and families a joyful, peaceful, and blessed Eid Mubarak! ✨",
                ],
                [
                    'date'        => '7 July 2026',
                    'emoji'       => '🌙',
                    'title'       => 'Eid-ul-Fitar Holidays',
                    'description' => "Please be informed that all online classes and school activities will remain suspended from 2nd Jun, 2026 to 6th Jun, 2026 in observance of Eid-ul-Adha.\n\nRegular classes will resume on 7th Jun, 2026\n\nWishing all our students, teachers, and families a joyful, peaceful, and blessed Eid Mubarak! ✨",
                ],
            ],
        ];
    }
}
