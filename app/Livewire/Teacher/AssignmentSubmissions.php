<?php

namespace App\Livewire\Teacher;

use App\Models\Assignment;
use App\Models\AssignmentAnswer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AssignmentSubmissions extends Component
{
    public Assignment $assignment;
    public array $rows = [];

    public function mount(Assignment $assignment): void
    {
        abort_unless($assignment->teacher_id === Auth::id(), 403);

        $this->assignment = $assignment;

        $fields = $assignment->product->exerciseFields()->where('teacher_id', Auth::id())->get()->keyBy('id');

        $this->rows = $assignment->students()->get()->map(function ($student) use ($assignment, $fields) {
            $answers = AssignmentAnswer::where('assignment_id', $assignment->id)
                ->where('student_id', $student->id)
                ->get()
                ->map(fn ($answer) => [
                    'label' => $fields->get($answer->exercise_field_id)?->label ?? '(deleted field)',
                    'page_number' => $fields->get($answer->exercise_field_id)?->page_number,
                    'value' => $answer->value,
                ])
                ->sortBy('page_number')
                ->values()
                ->all();

            return [
                'student_id' => $student->id,
                'name' => $student->name,
                'status' => $student->pivot->status,
                'submitted_at' => $student->pivot->submitted_at,
                'answers' => $answers,
            ];
        })->all();
    }

    public function render()
    {
        return view('livewire.teacher.assignment-submissions')
            ->extends('livewire.teacher.layouts.app', ['title' => $this->assignment->title.' Submissions | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
