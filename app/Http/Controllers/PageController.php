<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\AboutService;
use App\Services\EbooksService;
use App\Services\HardCopiesService;
use App\Services\MethodologyService;
use App\Services\NewSubjectService;
use App\Services\AudioStoriesService;
use App\Services\TeachersTrainingService;
use App\Services\HomeschoolingService;
use App\Services\OnlineClassesService;
use App\Services\LogotherapyService;
use App\Services\ContactService;
use App\Services\CounsellingService;
use App\Services\IntroductionService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private AboutService $aboutService,
        private EbooksService $ebooksService,
        private HardCopiesService $hardCopiesService,
        private MethodologyService $methodologyService,
        private NewSubjectService $newSubjectService,
        private AudioStoriesService $audioStoriesService,
        private TeachersTrainingService $teachersTrainingService,
        private OnlineClassesService $onlineClassesService,
        private HomeschoolingService $homeschoolingService,
        private LogotherapyService $logotherapyService,
        private ContactService $contactService,
        private CounsellingService $counsellingService,
        private IntroductionService $introductionService,
    ) {}

    public function about(): View
    {
        return view('pages.about', $this->aboutService->getData());
    }

    public function methodology(): View
    {
        return view('pages.methodology', $this->methodologyService->getData());
    }

    public function ebooks(): View
    {
        return view('pages.ebooks', $this->ebooksService->getData());
    }

    public function hardCopies(): View
    {
        return view('pages.hard-copies', $this->hardCopiesService->getData());
    }

    public function newSubject(): View
    {
        return view('pages.new-subject', $this->newSubjectService->getData());
    }

    public function onlineClasses(): View
    {
        return view('pages.online-classes', $this->onlineClassesService->getData());
    }

    public function teachersTraining(): View
    {
        return view('pages.teachers-training', $this->teachersTrainingService->getData());
    }

    public function audioStories(): View
    {
        return view('pages.audio-stories', $this->audioStoriesService->getData());
    }

    public function homeschooling(): View
    {
        return view('pages.homeschooling', $this->homeschoolingService->getData());
    }

    public function introduction(): View
    {
        return view('pages.introduction', $this->introductionService->getData());
    }

    public function logotherapy(): View
    {
        return view('pages.logotherapy', $this->logotherapyService->getData());
    }

    public function counselling(): View
    {
        return view('pages.counselling', $this->counsellingService->getData());
    }

    public function contact(): View
    {
        return view('pages.contact', $this->contactService->getData());
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
