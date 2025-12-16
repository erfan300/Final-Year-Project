<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminAuthController,
    ContentSectionController,
    SponsorController,
    MediaController,
    TechnicalSpecController,
    UpdateController,
    TeamProfileController,
    PublicController
};

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

Route::middleware('admin.auth')->group(function () {
    // FAQ + other single content sections (edit-only)
    Route::get('/content/{id}/edit', [ContentSectionController::class, 'edit'])->name('content.edit');
    Route::put('/content/{id}', [ContentSectionController::class, 'update'])->name('content.update');

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

    // Technical specs
    Route::get('/specs/create', [TechnicalSpecController::class, 'create'])->name('specs.create');
    Route::post('/specs', [TechnicalSpecController::class, 'store'])->name('specs.store');
    Route::get('/specs/{id}/edit', [TechnicalSpecController::class, 'edit'])->name('specs.edit');
    Route::put('/specs/{id}', [TechnicalSpecController::class, 'update'])->name('specs.update');
    Route::delete('/specs/{id}', [TechnicalSpecController::class, 'destroy'])->name('specs.destroy');

    // Updates / Results
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

Route::get('/faq', [PublicController::class, 'faq'])->name('faq');

Route::get('/sponsors', [PublicController::class, 'sponsors'])->name('sponsors');

Route::get('/updates', [PublicController::class, 'updates'])->name('updates');

Route::get('/team', [PublicController::class, 'team'])->name('team');

Route::get('/technical-specs', [PublicController::class, 'specs'])->name('specs');

Route::get('/media', [PublicController::class, 'media'])->name('media');