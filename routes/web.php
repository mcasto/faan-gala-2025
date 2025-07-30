<?php

use App\Http\Controllers\AuctionPaloozaController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// All routes will automatically handle localization via middleware
Route::get('/', [WelcomeController::class, 'show'])
    ->name('home');

Route::get('/sponsorship-opportunities', [SponsorshipController::class, 'show'])
    ->name('sponsorship-opportunities');

Route::get('/join-us', [JoinUsController::class, 'show'])
    ->name('join-us');

Route::get('/auction-palooza', [AuctionPaloozaController::class, 'show'])
    ->name('auction-palooza');

Route::post('/auction-palooza', [AuctionPaloozaController::class, 'store'])
    ->name('auction-palooza.store');

// Language switcher route
Route::get('/set-language/{locale}', function ($locale) {
    if (!in_array($locale, config('app.available_locales'))) {
        abort(400);
    }

    session()->put('locale', $locale);
    return redirect()->back();
})->name('language.set');
