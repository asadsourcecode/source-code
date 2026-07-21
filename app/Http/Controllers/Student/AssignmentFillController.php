<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentAnswer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssignmentFillController extends Controller
{
    public function show(Request $request, Assignment $assignment): View
    {
        $student = $request->user();
        $pivot = $assignment->students()->where('student_id', $student->id)->first();
        abort_unless($pivot !== null, 403, 'This assignment is not assigned to you.');

        $product = $assignment->product;
        $allowedPages = $product->allowedPagesFor($student);
        $pages = $product->pdfPages->take($allowedPages);

        abort_if($pages->isEmpty(), 404, "None of this assignment's pages are unlocked for you yet.");

        $fields = $product->exerciseFields()
            ->where('teacher_id', $assignment->teacher_id)
            ->where('page_number', '<=', $allowedPages)
            ->get();

        $existingAnswers = AssignmentAnswer::where('assignment_id', $assignment->id)
            ->where('student_id', $student->id)
            ->get()
            ->keyBy('exercise_field_id');

        $status = $pivot->pivot->status;

        // A middle page is a more reliable size reference than page 1 — many books
        // have a differently-proportioned cover/title page that isn't representative
        // of the actual content pages making up the bulk of the book.
        $referencePage = $pages->get(intdiv($pages->count(), 2)) ?? $pages->first();
        $pageAspect = ($referencePage && $referencePage->width && $referencePage->height)
            ? $referencePage->width / $referencePage->height
            : 5 / 7;

        return view('student.assignment-fill', compact('assignment', 'product', 'pages', 'fields', 'existingAnswers', 'status', 'allowedPages', 'pageAspect'));
    }

    public function saveAnswer(Request $request, Assignment $assignment): JsonResponse
    {
        $student = $request->user();
        $pivot = $assignment->students()->where('student_id', $student->id)->first();
        abort_unless($pivot !== null, 403);
        abort_if($pivot->pivot->status === 'submitted', 422, 'This assignment has already been submitted.');

        $validated = $request->validate([
            'exercise_field_id' => ['required', 'integer'],
            'value' => ['nullable'],
        ]);

        $field = $assignment->product->exerciseFields()->where('id', $validated['exercise_field_id'])->first();
        abort_unless($field !== null, 404);

        $allowedPages = $assignment->product->allowedPagesFor($student);
        abort_if($field->page_number > $allowedPages, 403, 'This page is not unlocked for you yet.');

        $value = $validated['value'] ?? null;
        if (is_array($value)) {
            $value = json_encode($value);
        }

        AssignmentAnswer::updateOrCreate(
            ['assignment_id' => $assignment->id, 'student_id' => $student->id, 'exercise_field_id' => $field->id],
            ['value' => $value],
        );

        return response()->json(['saved' => true]);
    }

    public function submit(Request $request, Assignment $assignment): JsonResponse
    {
        $student = $request->user();

        $updated = $assignment->students()->updateExistingPivot($student->id, [
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);

        abort_unless($updated, 403);

        return response()->json(['status' => 'submitted']);
    }
}
