<?php

namespace App\Services\Teacher;

use App\Models\Product;
use App\Models\ReadingProgress;
use App\Models\StudentBookOverride;
use App\Models\TeacherBookProgress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardService
{
    public function getData(): array
    {
        $teacher = Auth::user();

        if (! $teacher) {
            return $this->empty();
        }

        $subjectIds = $teacher->teachingSubjects()->pluck('subjects.id');

        $products = Product::whereIn('subject_id', $subjectIds)->get();

        $progressByProduct = TeacherBookProgress::where('teacher_id', $teacher->id)->get()->keyBy('product_id');
        $overridesByProduct = StudentBookOverride::where('teacher_id', $teacher->id)->get()->groupBy('product_id');

        $books = $products
            ->map(function (Product $product) use ($progressByProduct, $overridesByProduct) {
                $totalPages = (int) ($product->pdf_page_count ?: 0);
                $unlockedPage = $progressByProduct->get($product->id)?->unlocked_page ?? 0;

                $students = User::where('role', 'student')
                    ->whereHas('subjects', fn ($query) => $query->where('subjects.id', $product->subject_id))
                    ->get();

                $productOverrides = $overridesByProduct->get($product->id, collect())->keyBy('student_id');
                $readingByStudent = ReadingProgress::where('product_id', $product->id)
                    ->whereIn('user_id', $students->pluck('id'))
                    ->get()
                    ->keyBy('user_id');

                $studentsData = $students
                    ->map(function (User $student) use ($totalPages, $productOverrides, $readingByStudent) {
                        $currentPage = $readingByStudent->get($student->id)?->current_page ?? 0;

                        return [
                            'id' => $student->id,
                            'name' => $student->name,
                            'read_percent' => $totalPages > 0
                                ? (int) round(min($currentPage / $totalPages, 1) * 100)
                                : 0,
                            'override_page' => $productOverrides->get($student->id)?->unlocked_page ?? 0,
                        ];
                    })
                    ->values()
                    ->all();

                return [
                    'product_id' => $product->id,
                    'slug' => $product->slug,
                    'title' => $product->title,
                    'image' => $product->imageUrl(),
                    'total_pages' => $totalPages,
                    'unlocked_page' => $unlockedPage,
                    'students' => $studentsData,
                ];
            })
            ->values()
            ->all();

        $totalStudents = User::where('role', 'student')
            ->whereHas('subjects', fn ($query) => $query->whereIn('subjects.id', $subjectIds))
            ->count();

        return [
            'stats' => [
                'total_students' => $totalStudents,
                'active_assignments' => 0,
                'pending_submissions' => 0,
            ],
            'recent_activity' => [],
            'books' => $books,
        ];
    }

    private function empty(): array
    {
        return [
            'stats' => ['total_students' => 0, 'active_assignments' => 0, 'pending_submissions' => 0],
            'recent_activity' => [],
            'books' => [],
        ];
    }
}
