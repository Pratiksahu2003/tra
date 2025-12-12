<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Services\CryptoApiService;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    protected $apiService;

    public function __construct(CryptoApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $cryptos = Crypto::orderBy('rank', 'asc')->paginate(20);
        return view('cryptos.index', compact('cryptos'));
    }

    public function show(Crypto $crypto)
    {
        $crypto->load('transactions');
        return view('cryptos.show', compact('crypto'));
    }

    public function apiIndex()
    {
        $cryptos = Crypto::orderBy('rank', 'asc')->get();
        return response()->json($cryptos);
    }

    public function apiShow(Crypto $crypto)
    {
        return response()->json($crypto);
    }

    public function publicIndex()
    {
        $cryptos = Crypto::orderBy('rank', 'asc')->paginate(20);
        return view('cryptos.public', compact('cryptos'));
    }

    /**
     * Get real-time prices for all cryptos
     */
    public function getRealTimePrices()
    {
        $cryptos = Crypto::orderBy('rank', 'asc')->get(['id', 'symbol', 'price', 'change_24h', 'volume_24h', 'market_cap']);
        return response()->json($cryptos);
    }

    /**
     * Update prices from API
     */
    public function updatePrices()
    {
        $apiData = $this->apiService->fetchCryptoData();
        
        if (!$apiData) {
            return response()->json(['success' => false, 'message' => 'Failed to fetch data'], 500);
        }

        $mappedData = $this->apiService->mapToDatabaseFormat($apiData);
        $updated = 0;

        foreach ($mappedData as $data) {
            Crypto::updateOrCreate(
                ['symbol' => $data['symbol']],
                $data
            );
            $updated++;
        }

        return response()->json([
            'success' => true,
            'message' => "Updated {$updated} cryptocurrencies",
            'data' => Crypto::orderBy('rank', 'asc')->get()
        ]);
    }
}

