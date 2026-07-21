<?php

namespace App\Livewire\Teacher;

use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Assignments extends Component
{
    public array $assignments = [];

    public function mount(): void
    {
        $teacher = Auth::user();

        $this->assignments = Assignment::where('teacher_id', $teacher->id)
            ->with(['product', 'students'])
            ->latest()
            ->get()
            ->map(fn (Assignment $assignment) => [
                'id' => $assignment->id,
                'title' => $assignment->title,
                'book_title' => $assignment->product->title,
                'total_students' => $assignment->students->count(),
                'submitted_count' => $assignment->students->where('pivot.status', 'submitted')->count(),
                'created_at' => $assignment->created_at->format('M j, Y'),
            ])
            ->all();
    }

    public function render()
    {
        return view('livewire.teacher.assignments')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Assignments | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
