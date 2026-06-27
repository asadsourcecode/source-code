<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\AboutService;
use App\Services\MethodologyService;
use App\Services\NewSubjectService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private AboutService $aboutService,
        private MethodologyService $methodologyService,
        private NewSubjectService $newSubjectService,
    ) {}

    public function about(): View
    {
        return view('pages.about', $this->aboutService->getData());
    }

    public function methodology(): View
    {
        return view('pages.methodology', $this->methodologyService->getData());
    }

    public function newSubject(): View
    {
        return view('pages.new-subject', $this->newSubjectService->getData());
    }

    public function show(string $slug): View
    {
        $page = Page::active()->where('slug', $slug)->firstOrFail();

        $template = 'pages.' . $page->template;

        if (!view()->exists($template)) {
            $template = 'pages.default';
        }

        return view($template, compact('page'));
    }
}
