<?php

namespace App\Services\Teacher;

use Illuminate\Support\Facades\Auth;

class TeacherDashboardService
{
    public function getData(): array
    {
        $user = Auth::user();

        // Placeholder — will grow as teacher features (books, assignments, submissions) are built
        return [
            'stats' => [
                'total_students'      => 0,
                'active_assignments'  => 0,
                'pending_submissions' => 0,
            ],
            'recent_activity' => [],
        ];
    }
}
