<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\ProductSection;
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
use App\Services\PricingService;
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
        private PricingService $pricingService,
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

    public function pricing(): View
    {

        return view('pages.pricing', $this->pricingService->getData());
    }

    public function pricingPreview(): View
    {
        return view('pages.pricing', $this->pricingService->getData(preview: true));
    }

    public function register(): View
    {
        return view('pages.register');
    }

    public function account(): View
    {
        return view('pages.account', [
            'user' => auth()->user(),
        ]);
    }

    public function cart(): View
    {
        return view('pages.cart');
    }

    public function product(string $slug): View
    {
        $product = Product::where('slug', $slug)->where('status', true)->firstOrFail();

        $ebookPrice    = $product->ebook_price    ? number_format($product->ebook_price, 2)    : null;
        $hardcopyPrice = $product->hardcopy_price ? number_format($product->hardcopy_price, 2) : null;

        $hasSale      = $product->sale_price && (float)$product->sale_price < (float)$product->price;
        $defaultPrice = $ebookPrice ?? $hardcopyPrice ?? ($hasSale
            ? number_format($product->sale_price, 2)
            : ($product->price ? number_format($product->price, 2) : null));

        $originalPrice = ($hasSale && !$ebookPrice && !$hardcopyPrice)
            ? number_format($product->price, 2)
            : null;

        return view('pages.product', compact('product', 'ebookPrice', 'hardcopyPrice', 'defaultPrice', 'originalPrice'));
    }

    public function package(int $id): View
    {
        $section = ProductSection::findOrFail($id);

        $product = new Product();
        $product->title          = $section->title;
        $product->subtitle       = $section->subtitle;
        $product->description    = $section->description;
        $product->price          = $section->price;
        $product->sale_price     = $section->sale_price;
        $product->featured_image = $section->image;
        $product->sample_pdf     = null;

        $ebookPrice    = $section->ebook_price    ? number_format($section->ebook_price, 2)    : null;
        $hardcopyPrice = $section->hardcopy_price ? number_format($section->hardcopy_price, 2) : null;

        $hasSale      = $section->sale_price && (float)$section->sale_price < (float)$section->price;
        $defaultPrice = $ebookPrice ?? $hardcopyPrice ?? ($hasSale
            ? number_format($section->sale_price, 2)
            : ($section->price ? number_format($section->price, 2) : null));

        $originalPrice = ($hasSale && !$ebookPrice && !$hardcopyPrice)
            ? number_format($section->price, 2)
            : null;

        return view('pages.product', compact('product', 'ebookPrice', 'hardcopyPrice', 'defaultPrice', 'originalPrice'));
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
