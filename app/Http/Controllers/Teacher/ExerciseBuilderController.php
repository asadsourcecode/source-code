<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExerciseField;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ExerciseBuilderController extends Controller
{
    private const FONT_FAMILIES = [
        'Work Sans, sans-serif',
        'Arial, sans-serif',
        'Georgia, serif',
        'Times New Roman, serif',
        'Courier New, monospace',
    ];

    public function show(Request $request, Product $product): View
    {
        abort_unless($this->teacherHasAccess($request, $product), 403, 'None of your assigned students have purchased this book.');
        abort_unless($product->pdf_conversion_status === 'ready', 404, 'This book is not available to build exercises on yet.');

        $pages = $product->pdfPages;
        abort_if($pages->isEmpty(), 404, 'This book has no pages yet.');

        $fields = $product->exerciseFields()->where('teacher_id', $request->user()->id)->get();

        // A middle page is a more reliable size reference than page 1 — many books
        // have a differently-proportioned cover/title page that isn't representative
        // of the actual content pages making up the bulk of the book.
        $referencePage = $pages->get(intdiv($pages->count(), 2)) ?? $pages->first();
        $pageAspect = ($referencePage && $referencePage->width && $referencePage->height)
            ? $referencePage->width / $referencePage->height
            : 5 / 7;

        $fontFamilies = self::FONT_FAMILIES;

        return view('teacher.exercise-builder', compact('product', 'pages', 'fields', 'pageAspect', 'fontFamilies'));
    }

    public function store(Request $request, Product $product): JsonResponse
    {
        abort_unless($this->teacherHasAccess($request, $product), 403);

        $validated = $request->validate([
            'page_number' => ['required', 'integer', 'min:1', 'max:'.max($product->pdf_page_count, 1)],
            'type' => ['required', 'in:radio,checkbox,text,textarea'],
            'label' => ['required', 'string', 'max:255'],
            'options' => ['nullable', 'array'],
            'options.*' => ['string', 'max:255'],
            'position_x' => ['required', 'numeric', 'min:0', 'max:100'],
            'position_y' => ['required', 'numeric', 'min:0', 'max:100'],
            'font_size' => ['sometimes', 'integer', 'min:8', 'max:48'],
            'font_family' => ['sometimes', Rule::in(self::FONT_FAMILIES)],
            'font_weight' => ['sometimes', 'in:normal,bold'],
        ]);

        $field = ExerciseField::create([
            ...$validated,
            'product_id' => $product->id,
            'teacher_id' => $request->user()->id,
        ]);

        return response()->json($field);
    }

    public function update(Request $request, ExerciseField $field): JsonResponse
    {
        abort_unless($field->teacher_id === $request->user()->id, 403);

        $validated = $request->validate([
            'label' => ['sometimes', 'string', 'max:255'],
            'options' => ['sometimes', 'nullable', 'array'],
            'position_x' => ['sometimes', 'numeric', 'min:0', 'max:100'],
            'position_y' => ['sometimes', 'numeric', 'min:0', 'max:100'],
            'width' => ['sometimes', 'numeric', 'min:3', 'max:100'],
            'height' => ['sometimes', 'numeric', 'min:2', 'max:100'],
            'page_number' => ['sometimes', 'integer', 'min:1'],
            'font_size' => ['sometimes', 'integer', 'min:8', 'max:48'],
            'font_family' => ['sometimes', Rule::in(self::FONT_FAMILIES)],
            'font_weight' => ['sometimes', 'in:normal,bold'],
        ]);

        $field->update($validated);

        return response()->json($field);
    }

    public function destroy(Request $request, ExerciseField $field): JsonResponse
    {
        abort_unless($field->teacher_id === $request->user()->id, 403);

        $field->delete();

        return response()->json(['deleted' => true]);
    }

    private function teacherHasAccess(Request $request, Product $product): bool
    {
        $studentIds = User::where('teacher_id', $request->user()->id)->where('role', 'student')->pluck('id');

        return OrderItem::where('product_id', $product->id)
            ->whereHas('order', fn ($query) => $query->whereIn('user_id', $studentIds)->where('status', 'paid'))
            ->exists();
    }
}
