<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\ProductController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/kontak', [ContactController::class, 'show'])->name('contact');

// Public write endpoint: throttled so bots cannot flood the inbox (each submission
// also costs an email and a paid WhatsApp gateway message).
Route::post('/kontak', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Every account on this site is an admin; /dashboard only exists so old bookmarks and
// Breeze's "intended" redirects land somewhere useful. A redirect (not a closure) keeps
// `php artisan route:cache` working.
Route::redirect('/dashboard', '/admin')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
