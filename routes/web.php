<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Role Selection
    Route::get('/role-selection', [\App\Http\Controllers\RoleController::class, 'select'])->name('role.select');
    Route::post('/role-selection', [\App\Http\Controllers\RoleController::class, 'store'])->name('role.store');

    // Onboarding
    Route::get('/onboarding/creator', [\App\Http\Controllers\OnboardingController::class, 'creator'])->name('onboarding.creator');
    Route::post('/onboarding/creator', [\App\Http\Controllers\OnboardingController::class, 'storeCreator'])->name('onboarding.creator.store');
    Route::get('/onboarding/investor', [\App\Http\Controllers\OnboardingController::class, 'investor'])->name('onboarding.investor');
    Route::post('/onboarding/investor', [\App\Http\Controllers\OnboardingController::class, 'storeInvestor'])->name('onboarding.investor.store');

    // Dashboard / Discovery Feed
    Route::get('/dashboard', [\App\Http\Controllers\MatchingController::class, 'index'])->name('dashboard');

    // Livewire Chat
    Route::get('/chat/{match}', \App\Livewire\ChatComponent::class)->name('chat');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
