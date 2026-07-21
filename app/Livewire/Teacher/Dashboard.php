<?php

namespace App\Livewire\Teacher;

use App\Models\StudentBookOverride;
use App\Models\TeacherBookProgress;
use App\Services\Teacher\TeacherDashboardService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public array $stats = [];
    public array $recentActivity = [];
    public array $books = [];

    public function mount(TeacherDashboardService $dashboardService): void
    {
        $this->loadData($dashboardService);
    }

    public function updateUnlockedPage(int $productId, int $page, TeacherDashboardService $dashboardService): void
    {
        $teacher = Auth::user();

        // Authorize: only allow adjusting books this teacher's own assigned students actually have.
        abort_unless(collect($this->books)->firstWhere('product_id', $productId) !== null, 403);

        TeacherBookProgress::updateOrCreate(
            ['teacher_id' => $teacher->id, 'product_id' => $productId],
            ['unlocked_page' => max(0, $page)],
        );

        $this->loadData($dashboardService);
    }

    public function updateStudentOverride(int $studentId, int $productId, int $page, TeacherDashboardService $dashboardService): void
    {
        $teacher = Auth::user();

        // Authorize: only allow overriding students who are actually eligible for this book
        // (i.e. already appear in this teacher's subject-scoped book/student list).
        $book = collect($this->books)->firstWhere('product_id', $productId);
        $isEligibleStudent = $book && collect($book['students'])->contains('id', $studentId);
        abort_unless($isEligibleStudent, 403);

        StudentBookOverride::updateOrCreate(
            ['student_id' => $studentId, 'product_id' => $productId],
            ['teacher_id' => $teacher->id, 'unlocked_page' => max(0, $page)],
        );

        $this->loadData($dashboardService);
    }

    public function render()
    {
        return view('livewire.teacher.dashboard')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Dashboard | ICE Teacher Portal'])
            ->section('portal-content');
    }

    private function loadData(TeacherDashboardService $dashboardService): void
    {
        $data = $dashboardService->getData();

        $this->stats = $data['stats'];
        $this->recentActivity = $data['recent_activity'];
        $this->books = $data['books'];
    }
}
