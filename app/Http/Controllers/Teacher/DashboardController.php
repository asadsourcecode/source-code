<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Services\TeacherDashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(private TeacherDashboardService $dashboardService) {}

    public function index(): View
    {
        return view('teacher.pages.dashboard', $this->dashboardService->getData());
    }
}
