<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/methodology', [PageController::class, 'methodology'])->name('methodology');
Route::get('/ebooks', [PageController::class, 'ebooks'])->name('ebooks');
Route::get('/hard-copies', [PageController::class, 'hardCopies'])->name('hard-copies');
Route::get('/new-subject', [PageController::class, 'newSubject'])->name('new-subject');
Route::get('/audio-stories', [PageController::class, 'audioStories'])->name('audio-stories');
Route::get('/teachers-training', [PageController::class, 'teachersTraining'])->name('teachers-training');
Route::get('/online-classes', [PageController::class, 'onlineClasses'])->name('online-classes');
Route::get('/homeschooling', [PageController::class, 'homeschooling'])->name('homeschooling');
Route::get('/pages/introduction', [PageController::class, 'introduction'])->name('introduction');
Route::get('/logotherapy', [PageController::class, 'logotherapy'])->name('logotherapy');
Route::get('/counselling', [PageController::class, 'counselling'])->name('counselling');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/pricing/preview', [PageController::class, 'pricingPreview'])->name('pricing.preview');
Route::get('/account', [PageController::class, 'account'])->middleware('auth')->name('account');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/product/{slug}', [PageController::class, 'product'])->name('product.show');
Route::get('/package/{id}', [PageController::class, 'package'])->name('package.show');
Route::get('/pages/{slug}', [PageController::class, 'show'])->name('page.show');
