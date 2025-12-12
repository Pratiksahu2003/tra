<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Public API routes
Route::get('/cryptos/realtime', [CryptoController::class, 'getRealTimePrices']);
Route::get('/cryptos', [CryptoController::class, 'apiIndex']);
Route::get('/cryptos/{crypto}', [CryptoController::class, 'apiShow']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cryptos/update-prices', [CryptoController::class, 'updatePrices']);
    
    Route::get('/portfolio', [PortfolioController::class, 'apiIndex']);
    
    Route::get('/transactions', [TransactionController::class, 'apiIndex']);
    Route::post('/transactions', [TransactionController::class, 'store']);
});

