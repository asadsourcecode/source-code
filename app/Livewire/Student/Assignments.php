<?php

namespace App\Livewire\Student;

use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Assignments extends Component
{
    public array $assignments = [];

    public function mount(): void
    {
        $student = Auth::user();

        $this->assignments = Assignment::whereHas('students', fn ($query) => $query->where('student_id', $student->id))
            ->with('product')
            ->latest()
            ->get()
            ->map(function (Assignment $assignment) use ($student) {
                $pivot = $assignment->students()->where('student_id', $student->id)->first()->pivot;

                return [
                    'id' => $assignment->id,
                    'title' => $assignment->title,
                    'book_title' => $assignment->product->title,
                    'status' => $pivot->status,
                ];
            })
            ->all();
    }

    public function render()
    {
        return view('livewire.student.assignments')
            ->extends('livewire.student.layouts.app', ['title' => 'Assignments | ICE Student Portal'])
            ->section('portal-content');
    }
}
