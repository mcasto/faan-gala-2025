<?php

use App\Http\Controllers\AuctionPaloozaController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\MeetFaantasticsController;
use App\Http\Controllers\SponsorshipOpportunitiesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '{lang}', 'middleware' => 'api'], function () {
    Route::get('/welcome', [WelcomeController::class, 'index'])
        ->name('api.home.index');

    Route::get('/tickets', [TicketController::class, 'show'])
        ->name('api.tickets.show');

    Route::post('/tickets', [TicketController::class, 'store'])
        ->name('api.tickets.store');

    Route::get('/auction-palooza', [AuctionPaloozaController::class, 'index'])
        ->name('api.auction-palooza.index');

    Route::post('/auction-palooza', [AuctionPaloozaController::class, 'store'])
        ->name('api.auction-palooza.store');

    Route::get('/join-us', [JoinUsController::class, 'index'])
        ->name('api.join-us');

    Route::get('/meet-faantastics', [MeetFaantasticsController::class, 'index'])
        ->name('api.meet-faantastics.index');

    Route::get('/sponsorship-opportunities', [SponsorshipOpportunitiesController::class, 'index'])
        ->name('api.sponsorship-opportunities.index');
});

Route::post('/auction-item-image', [AuctionPaloozaController::class, 'uploadItemImage'])
    ->name('api.auction-item-image');
