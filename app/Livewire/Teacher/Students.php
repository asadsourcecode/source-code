<?php

namespace App\Livewire\Teacher;

use App\Services\Teacher\TeacherStudentsService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Students extends Component
{
    public string $search = '';

    public array $students = [];
    public array $stats = [];

    public function mount(TeacherStudentsService $studentsService): void
    {
        $data = $studentsService->getData();

        $this->students = $data['students'];
        $this->stats = $data['stats'];
    }

    #[Computed]
    public function filteredStudents(): array
    {
        $search = strtolower(trim($this->search));

        if ($search === '') {
            return $this->students;
        }

        return array_values(array_filter(
            $this->students,
            fn (array $student) => str_contains(strtolower($student['name']), $search)
                || str_contains(strtolower($student['email']), $search)
        ));
    }

    public function render()
    {
        return view('livewire.teacher.students')
            ->extends('livewire.teacher.layouts.app', ['title' => 'My Students | ICE Teacher Portal'])
            ->section('portal-content');
    }
}
