<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\ProductSection;
use App\Services\Website\AboutService;
use App\Services\Website\EbooksService;
use App\Services\Website\HardCopiesService;
use App\Services\Website\MethodologyService;
use App\Services\Website\NewSubjectService;
use App\Services\Website\AudioStoriesService;
use App\Services\Website\TeachersTrainingService;
use App\Services\Website\HomeschoolingService;
use App\Services\Website\OnlineClassesService;
use App\Services\Website\LogotherapyService;
use App\Services\Website\ContactService;
use App\Services\Website\CounsellingService;
use App\Services\Website\HomeService;
use App\Services\Website\IntroductionService;
use App\Services\Website\PricingService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(HomeService $homeService): View
    {
        return view('welcome', $homeService->getData());
    }

    public function about(AboutService $aboutService): View
    {
        return view('pages.about', $aboutService->getData());
    }

    public function methodology(MethodologyService $methodologyService): View
    {
        return view('pages.methodology', $methodologyService->getData());
    }

    public function ebooks(EbooksService $ebooksService): View
    {
        return view('pages.ebooks', $ebooksService->getData());
    }

    public function hardCopies(HardCopiesService $hardCopiesService): View
    {
        return view('pages.hard-copies', $hardCopiesService->getData());
    }

    public function newSubject(NewSubjectService $newSubjectService): View
    {
        return view('pages.new-subject', $newSubjectService->getData());
    }

    public function onlineClasses(OnlineClassesService $onlineClassesService): View
    {
        return view('pages.online-classes', $onlineClassesService->getData());
    }

    public function teachersTraining(TeachersTrainingService $teachersTrainingService): View
    {
        return view('pages.teachers-training', $teachersTrainingService->getData());
    }

    public function audioStories(AudioStoriesService $audioStoriesService): View
    {
        return view('pages.audio-stories', $audioStoriesService->getData());
    }

    public function homeschooling(HomeschoolingService $homeschoolingService): View
    {
        return view('pages.homeschooling', $homeschoolingService->getData());
    }

    public function introduction(IntroductionService $introductionService): View
    {
        return view('pages.introduction', $introductionService->getData());
    }

    public function logotherapy(LogotherapyService $logotherapyService): View
    {
        return view('pages.logotherapy', $logotherapyService->getData());
    }

    public function counselling(CounsellingService $counsellingService): View
    {
        return view('pages.counselling', $counsellingService->getData());
    }

    public function contact(ContactService $contactService): View
    {
        return view('pages.contact', $contactService->getData());
    }

    public function pricing(PricingService $pricingService): View
    {
        return view('pages.pricing', $pricingService->getData());
    }

    public function pricingPreview(PricingService $pricingService): View
    {
        return view('pages.pricing', $pricingService->getData(preview: true));
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
