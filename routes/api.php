<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Public API routes
// IMPORTANT: Specific routes must come BEFORE parameterized routes
Route::get('/cryptos/realtime', [CryptoController::class, 'getRealTimePrices']);
Route::get('/cryptos/list/all', [CryptoController::class, 'getAllCryptoList']); // Get all possible crypto coins
Route::get('/cryptos/top/gainers', [CryptoController::class, 'getTopGainers']); // Get top gainers
Route::get('/cryptos/top/losers', [CryptoController::class, 'getTopLosers']); // Get top losers
Route::get('/cryptos/top', [CryptoController::class, 'getTopCryptos']); // Get top cryptos by market cap
Route::get('/cryptos', [CryptoController::class, 'apiIndex']);
Route::get('/cryptos/{crypto}', [CryptoController::class, 'apiShow']); // This must be LAST

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cryptos/update-prices', [CryptoController::class, 'updatePrices']);
    
    Route::get('/portfolio', [PortfolioController::class, 'apiIndex']);
    
    Route::get('/transactions', [TransactionController::class, 'apiIndex']);
    Route::post('/transactions', [TransactionController::class, 'store']);
});

