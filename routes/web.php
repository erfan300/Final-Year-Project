<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminAuthController,
    ContentSectionController,
    SponsorController,
    MediaController,
    UpdateController,
    TeamProfileController,
    PublicController,
    RecruitmentSubmissionController,
    SponsorshipSubmissionController,
    GeneralEnquiryController,
    FaqController,
    CarBuildController
};

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

Route::prefix('admin')->middleware('admin.auth')->group(function () {

    // Content section
    Route::get('/content/{id}/edit', [ContentSectionController::class, 'edit'])->name('content.edit');
    Route::put('/content/{id}', [ContentSectionController::class, 'update'])->name('content.update');
    Route::get('/content/create', [ContentSectionController::class, 'create'])->name('content.create');
    Route::post('/content/store', [ContentSectionController::class, 'store'])->name('content.store');

    // FAQ
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    // Sponsors (logo + website)
    Route::get('/sponsors/create', [SponsorController::class, 'create'])->name('sponsors.create');
    Route::post('/sponsors', [SponsorController::class, 'store'])->name('sponsors.store');
    Route::get('/sponsors/{id}/edit', [SponsorController::class, 'edit'])->name('sponsors.edit');
    Route::put('/sponsors/{id}', [SponsorController::class, 'update'])->name('sponsors.update');
    Route::delete('/sponsors/{id}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');

    // Media gallery
    Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/media/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/media/{id}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

    // Car Builds
    Route::get('/builds/create', [CarBuildController::class, 'create'])->name('builds.create');
    Route::post('/builds', [CarBuildController::class, 'store'])->name('builds.store');
    Route::get('/builds/{build}/edit', [CarBuildController::class, 'edit'])->name('builds.edit');
    Route::put('/builds/{build}', [CarBuildController::class, 'update'])->name('builds.update');
    Route::delete('/builds/{build}', [CarBuildController::class, 'destroy'])->name('builds.destroy');

    // Updates
    Route::get('/updates/create', [UpdateController::class, 'create'])->name('updates.create');
    Route::post('/updates', [UpdateController::class, 'store'])->name('updates.store');
    Route::get('/updates/{id}/edit', [UpdateController::class, 'edit'])->name('updates.edit');
    Route::put('/updates/{id}', [UpdateController::class, 'update'])->name('updates.update');
    Route::delete('/updates/{id}', [UpdateController::class, 'destroy'])->name('updates.destroy');

    // Team Profiles
    Route::get('/team/create', [TeamProfileController::class, 'create'])->name('team.create');
    Route::post('/team', [TeamProfileController::class, 'store'])->name('team.store');
    Route::get('/team/{id}/edit', [TeamProfileController::class, 'edit'])->name('team.edit');
    Route::put('/team/{id}', [TeamProfileController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [TeamProfileController::class, 'destroy'])->name('team.destroy');
});

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/recruitment', [PublicController::class, 'recruitment'])->name('recruitment');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/sponsors', [PublicController::class, 'sponsors'])->name('sponsors');

Route::get('/updates', [PublicController::class, 'updates'])->name('updates');

Route::get('/team', [PublicController::class, 'team'])->name('team');

Route::get('/technical-specs', [PublicController::class, 'specs'])->name('specs');

Route::get('/media', [PublicController::class, 'media'])->name('media');

Route::post('/recruitment/submit', [RecruitmentSubmissionController::class, 'store'])
    ->name('recruitment.submit');

Route::post('/sponsorship/submit', [SponsorshipSubmissionController::class, 'store'])
    ->name('sponsorship.submit');

Route::post('/contact/submit', [GeneralEnquiryController::class, 'store'])
    ->name('contact.submit');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});