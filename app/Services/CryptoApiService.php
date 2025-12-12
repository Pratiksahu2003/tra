<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CryptoApiService
{
    private $baseUrl = 'https://api.coingecko.com/api/v3';

    /**
     * Fetch cryptocurrency data from CoinGecko API
     */
    public function fetchCryptoData($symbols = null)
    {
        try {
            // Popular crypto IDs for CoinGecko
            $cryptoIds = [
                'BTC' => 'bitcoin',
                'ETH' => 'ethereum',
                'BNB' => 'binancecoin',
                'SOL' => 'solana',
                'ADA' => 'cardano',
                'XRP' => 'ripple',
                'DOT' => 'polkadot',
                'DOGE' => 'dogecoin',
                'MATIC' => 'matic-network',
                'AVAX' => 'avalanche-2',
                'LINK' => 'chainlink',
                'UNI' => 'uniswap',
                'LTC' => 'litecoin',
                'ATOM' => 'cosmos',
                'ETC' => 'ethereum-classic',
            ];

            $ids = implode(',', array_values($cryptoIds));
            
            $response = Http::timeout(10)->get($this->baseUrl . '/coins/markets', [
                'vs_currency' => 'usd',
                'ids' => $ids,
                'order' => 'market_cap_desc',
                'per_page' => 100,
                'page' => 1,
                'sparkline' => false,
                'price_change_percentage' => '24h'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('CoinGecko API error: ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('Error fetching crypto data: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Map CoinGecko data to our database format
     */
    public function mapToDatabaseFormat($apiData)
    {
        $symbolMap = [
            'bitcoin' => 'BTC',
            'ethereum' => 'ETH',
            'binancecoin' => 'BNB',
            'solana' => 'SOL',
            'cardano' => 'ADA',
            'ripple' => 'XRP',
            'polkadot' => 'DOT',
            'dogecoin' => 'DOGE',
            'matic-network' => 'MATIC',
            'avalanche-2' => 'AVAX',
            'chainlink' => 'LINK',
            'uniswap' => 'UNI',
            'litecoin' => 'LTC',
            'cosmos' => 'ATOM',
            'ethereum-classic' => 'ETC',
        ];

        $mapped = [];
        
        foreach ($apiData as $crypto) {
            $symbol = $symbolMap[$crypto['id']] ?? strtoupper(substr($crypto['symbol'], 0, 3));
            
            $mapped[] = [
                'symbol' => $symbol,
                'name' => $crypto['name'],
                'price' => $crypto['current_price'] ?? 0,
                'change_24h' => $crypto['price_change_percentage_24h'] ?? 0,
                'volume_24h' => $crypto['total_volume'] ?? 0,
                'market_cap' => $crypto['market_cap'] ?? 0,
                'high_24h' => $crypto['high_24h'] ?? 0,
                'low_24h' => $crypto['low_24h'] ?? 0,
                'circulating_supply' => $crypto['circulating_supply'] ?? 0,
                'total_supply' => $crypto['total_supply'] ?? 0,
                'logo_url' => $crypto['image'] ?? null,
                'rank' => $crypto['market_cap_rank'] ?? null,
            ];
        }

        return $mapped;
    }

    /**
     * Get real-time price for a specific crypto
     */
    public function getRealTimePrice($cryptoId)
    {
        try {
            $response = Http::timeout(5)->get($this->baseUrl . '/simple/price', [
                'ids' => $cryptoId,
                'vs_currencies' => 'usd',
                'include_24hr_change' => true,
                'include_24hr_vol' => true,
                'include_market_cap' => true
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Error fetching real-time price: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get all available Crypto Market list from CoinGecko
     * This returns all possible coins (thousands of them)
     */
    public function getAllCryptoList()
    {
        try {
            $response = Http::timeout(30)->get($this->baseUrl . '/coins/list', [
                'include_platform' => 'false'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('CoinGecko API error (coins/list): ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('Error fetching all crypto list: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get top Crypto Market by market cap (supports pagination)
     */
    public function getTopCryptos($page = 1, $perPage = 250)
    {
        try {
            $response = Http::timeout(30)->get($this->baseUrl . '/coins/markets', [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => min($perPage, 250), // CoinGecko max is 250
                'page' => $page,
                'sparkline' => false,
                'price_change_percentage' => '24h'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('CoinGecko API error (markets): ' . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error('Error fetching top cryptos: ' . $e->getMessage());
            return null;
        }
    }
}

