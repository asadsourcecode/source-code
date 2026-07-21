<?php

namespace App\Services\Teacher;

use App\Models\OrderItem;
use App\Models\ReadingProgress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherStudentsService
{
    public function getData(): array
    {
        $teacher = Auth::user();

        if (! $teacher) {
            return $this->empty();
        }

        $students = User::where('teacher_id', $teacher->id)->where('role', 'student')->get();
        $studentIds = $students->pluck('id');

        $orderItems = OrderItem::whereHas('order', fn ($query) => $query
                ->whereIn('user_id', $studentIds)
                ->where('status', 'paid'))
            ->with('product', 'order')
            ->get()
            ->filter(fn (OrderItem $item) => $item->product !== null)
            ->groupBy('order.user_id');

        $readingByUser = ReadingProgress::whereIn('user_id', $studentIds)->get()->groupBy('user_id');

        $list = $students->map(function (User $student) use ($orderItems, $readingByUser) {
            $items = $orderItems->get($student->id, collect())->unique('product_id');
            $reading = $readingByUser->get($student->id, collect())->keyBy('product_id');

            $percents = $items->map(function (OrderItem $item) use ($reading) {
                $totalPages = (int) ($item->product->pdf_page_count ?: 0);
                $currentPage = $reading->get($item->product_id)?->current_page ?? 0;

                return $totalPages > 0 ? min($currentPage / $totalPages, 1) * 100 : 0;
            });

            return [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'books_count' => $items->count(),
                'progress' => $percents->isEmpty() ? 0 : (int) round($percents->avg()),
                'last_activity' => $reading->max('updated_at'),
            ];
        })->sortBy('name')->values()->all();

        $allItems = $orderItems->flatten();

        return [
            'students' => $list,
            'stats' => [
                'total_students' => count($list),
                'total_books' => $allItems->unique('product_id')->count(),
                'average_progress' => count($list) ? (int) round(collect($list)->avg('progress')) : 0,
            ],
        ];
    }

    private function empty(): array
    {
        return [
            'students' => [],
            'stats' => ['total_students' => 0, 'total_books' => 0, 'average_progress' => 0],
        ];
    }
}
