<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Posts (blog/berita)
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class)->except(['show']);

    // Products
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);

    // Inquiries (inbox dari form kontak)
    Route::prefix('inquiries')->name('inquiries.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('index');
        Route::get('{inquiry}', [\App\Http\Controllers\Admin\InquiryController::class, 'show'])->name('show');
        Route::patch('{inquiry}/read', [\App\Http\Controllers\Admin\InquiryController::class, 'markRead'])->name('read');
        Route::delete('{inquiry}', [\App\Http\Controllers\Admin\InquiryController::class, 'destroy'])->name('destroy');
    });
});
