<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\StudentDashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(private StudentDashboardService $dashboardService) {}

    public function index(): View
    {
        return view('student.pages.dashboard', $this->dashboardService->getData());
    }
}
