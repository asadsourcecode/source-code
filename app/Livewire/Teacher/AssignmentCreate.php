<?php

namespace App\Livewire\Teacher;

use App\Models\Assignment;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AssignmentCreate extends Component
{
    public array $books = [];
    public array $students = [];

    public ?int $productId = null;
    public string $title = '';
    public string $instructions = '';
    public array $selectedStudentIds = [];

    public function mount(): void
    {
        $teacher = Auth::user();
        $studentIds = User::where('teacher_id', $teacher->id)->where('role', 'student')->pluck('id');

        $this->books = OrderItem::whereHas('order', fn ($query) => $query->whereIn('user_id', $studentIds)->where('status', 'paid'))
            ->with('product')
            ->get()
            ->pluck('product')
            ->filter()
            ->unique('id')
            ->values()
            ->map(fn ($product) => ['id' => $product->id, 'title' => $product->title])
            ->all();

        $this->students = User::where('teacher_id', $teacher->id)->where('role', 'student')->get(['id', 'name'])->toArray();
    }

    public function save()
    {
        $validated = $this->validate([
            'productId' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'instructions' => ['nullable', 'string'],
            'selectedStudentIds' => ['required', 'array', 'min:1'],
        ]);

        $teacher = Auth::user();

        abort_unless(collect($this->books)->pluck('id')->contains($validated['productId']), 403);

        $validStudentIds = User::where('teacher_id', $teacher->id)
            ->whereIn('id', $validated['selectedStudentIds'])
            ->pluck('id');

        abort_if($validStudentIds->isEmpty(), 403);

        $assignment = Assignment::create([
            'teacher_id' => $teacher->id,
            'product_id' => $validated['productId'],
            'title' => $validated['title'],
            'instructions' => $validated['instructions'],
            'published_at' => now(),
        ]);

        foreach ($validStudentIds as $studentId) {
            $assignment->students()->attach($studentId, ['status' => 'assigned']);
        }

        return redirect()->route('teacher.assignments.index');
    }

    public function render()
    {
        return view('livewire.teacher.assignment-create')
            ->extends('livewire.teacher.layouts.app', ['title' => 'Create Assignment | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
