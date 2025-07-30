<?php

use App\Http\Controllers\AuctionPaloozaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AuctionItemController;
use App\Http\Controllers\Admin\UserController;
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

// Admin routes
Route::redirect('/admin', '/admin/auction-items')->middleware('auth');

Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Protected admin routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    // User management routes
    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->name('users.create');

    Route::get('/users/{user}', [UserController::class, 'show'])
        ->name('users.show');

    Route::post('/users', [UserController::class, 'store'])
        ->name('users.store');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit');

    Route::put('/users/{user}', [UserController::class, 'update'])
        ->name('users.update');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy');

    // Auction item routes
    Route::get('/auction-items', [AuctionItemController::class, 'index'])
        ->name('auction-items.index');

    Route::get('/auction-items/create', [AuctionItemController::class, 'create'])
        ->name('auction-items.create');

    Route::post('/auction-items', [AuctionItemController::class, 'store'])
        ->name('auction-items.store');

    Route::get('/auction-items/{item}/edit', [AuctionItemController::class, 'edit'])
        ->name('auction-items.edit');

    Route::put('/auction-items/{item}', [AuctionItemController::class, 'update'])
        ->name('auction-items.update');

    Route::delete('/auction-items/{item}', [AuctionItemController::class, 'destroy'])
        ->name('auction-items.destroy');

    Route::post('/auction-items/{id}/restore', [AuctionItemController::class, 'restore'])
        ->name('auction-items.restore');
});
