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

    public function apiIndex(Request $request)
    {
        $perPage = $request->get('per_page', 20);
        $page = $request->get('page', 1);
        
        $cryptos = Crypto::orderBy('rank', 'asc')->paginate($perPage, ['*'], 'page', $page);
        
        return response()->json([
            'data' => $cryptos->items(),
            'current_page' => $cryptos->currentPage(),
            'last_page' => $cryptos->lastPage(),
            'per_page' => $cryptos->perPage(),
            'total' => $cryptos->total(),
            'from' => $cryptos->firstItem(),
            'to' => $cryptos->lastItem(),
        ]);
    }

    public function apiShow(Crypto $crypto)
    {
        try {
            // Fetch fresh data from API for this specific crypto
            $apiData = $this->apiService->fetchCryptoData();
            
            if ($apiData) {
                $mappedData = $this->apiService->mapToDatabaseFormat($apiData);
                
                // Find matching crypto in API data
                foreach ($mappedData as $data) {
                    if (strtoupper($data['symbol']) === strtoupper($crypto->symbol)) {
                        // Update database
                        $crypto->update($data);
                        break;
                    }
                }
            }
            
            // Reload to get updated data
            $crypto->refresh();
            return response()->json($crypto);
        } catch (\Exception $e) {
            // Return existing data on error
            return response()->json($crypto);
        }
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
        try {
            // Fetch fresh data from API
            $apiData = $this->apiService->fetchCryptoData();
            
            if (!$apiData) {
                // Fallback to database if API fails
                $cryptos = Crypto::orderBy('rank', 'asc')->get(['id', 'symbol', 'price', 'change_24h', 'volume_24h', 'market_cap']);
                return response()->json($cryptos);
            }

            $mappedData = $this->apiService->mapToDatabaseFormat($apiData);
            $cryptoMap = [];

            // Update database and prepare response
            foreach ($mappedData as $data) {
                $crypto = Crypto::updateOrCreate(
                    ['symbol' => $data['symbol']],
                    $data
                );
                $cryptoMap[$crypto->id] = [
                    'id' => $crypto->id,
                    'symbol' => $crypto->symbol,
                    'price' => (float) $crypto->price,
                    'change_24h' => (float) $crypto->change_24h,
                    'volume_24h' => (float) $crypto->volume_24h,
                    'market_cap' => $crypto->market_cap ? (float) $crypto->market_cap : null,
                ];
            }

            return response()->json(array_values($cryptoMap));
        } catch (\Exception $e) {
            // Fallback to database on error
            $cryptos = Crypto::orderBy('rank', 'asc')->get(['id', 'symbol', 'price', 'change_24h', 'volume_24h', 'market_cap']);
            return response()->json($cryptos);
        }
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
            'message' => "Updated {$updated} Crypto Market",
            'data' => Crypto::orderBy('rank', 'asc')->get()
        ]);
    }

    /**
     * Get all available Crypto Market list from CoinGecko
     * Returns all possible crypto coins (thousands)
     */
    public function getAllCryptoList(Request $request)
    {
        try {
            $search = $request->get('search', '');
            $limit = $request->get('limit', 1000);
            
            $allCryptos = $this->apiService->getAllCryptoList();
            
            if (!$allCryptos) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch crypto list from API',
                    'data' => []
                ], 500);
            }

            // Filter by search term if provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $allCryptos = array_filter($allCryptos, function($crypto) use ($searchLower) {
                    return strpos(strtolower($crypto['name']), $searchLower) !== false ||
                           strpos(strtolower($crypto['symbol']), $searchLower) !== false ||
                           strpos(strtolower($crypto['id']), $searchLower) !== false;
                });
            }

            // Limit results
            if ($limit > 0) {
                $allCryptos = array_slice($allCryptos, 0, $limit);
            }

            return response()->json([
                'success' => true,
                'total' => count($allCryptos),
                'data' => array_values($allCryptos)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching crypto list: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
     * Get top Crypto Market by market cap with pagination
     */
    public function getTopCryptos(Request $request)
    {
        try {
            $page = $request->get('page', 1);
            $perPage = min($request->get('per_page', 250), 250); // Max 250 per CoinGecko
            
            $apiData = $this->apiService->getTopCryptos($page, $perPage);
            
            if (!$apiData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch top cryptos from API',
                    'data' => []
                ], 500);
            }

            // Map to simpler format
            $cryptos = array_map(function($crypto) {
                return [
                    'id' => $crypto['id'],
                    'symbol' => strtoupper($crypto['symbol']),
                    'name' => $crypto['name'],
                    'current_price' => $crypto['current_price'] ?? 0,
                    'market_cap' => $crypto['market_cap'] ?? 0,
                    'market_cap_rank' => $crypto['market_cap_rank'] ?? null,
                    'price_change_percentage_24h' => $crypto['price_change_percentage_24h'] ?? 0,
                    'total_volume' => $crypto['total_volume'] ?? 0,
                    'high_24h' => $crypto['high_24h'] ?? 0,
                    'low_24h' => $crypto['low_24h'] ?? 0,
                    'image' => $crypto['image'] ?? null,
                ];
            }, $apiData);

            $currentCount = count($cryptos);
            $hasMore = $currentCount === $perPage; // If we got full page, likely more pages exist
            
            // CoinGecko doesn't provide total count, so we estimate
            // If we have a full page, assume there are more pages available
            // CoinGecko typically has thousands of coins, so we allow navigation
            $estimatedTotal = $hasMore ? ($page * $perPage) + ($perPage * 50) : ($page - 1) * $perPage + $currentCount;
            // Always allow at least current page + 10 more if we have full page
            $estimatedLastPage = $hasMore ? max($page + 10, 20) : $page;

            return response()->json([
                'success' => true,
                'page' => $page,
                'per_page' => $perPage,
                'total' => $estimatedTotal,
                'current_count' => $currentCount,
                'has_more' => $hasMore,
                'last_page' => $estimatedLastPage,
                'data' => $cryptos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching top cryptos: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
     * Get top gainers (cryptos with highest 24h price increase)
     */
    public function getTopGainers(Request $request)
    {
        try {
            $page = $request->get('page', 1);
            $perPage = min($request->get('per_page', 250), 250);
            
            $apiData = $this->apiService->getTopCryptos($page, $perPage);
            
            if (!$apiData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch top gainers from API',
                    'data' => []
                ], 500);
            }

            // Sort by price_change_percentage_24h descending (highest gains first)
            usort($apiData, function($a, $b) {
                $changeA = $a['price_change_percentage_24h'] ?? 0;
                $changeB = $b['price_change_percentage_24h'] ?? 0;
                return $changeB <=> $changeA; // Descending order
            });

            // Filter out negative changes and take top results
            $gainers = array_filter($apiData, function($crypto) {
                return ($crypto['price_change_percentage_24h'] ?? 0) > 0;
            });

            // Apply pagination
            $offset = ($page - 1) * $perPage;
            $paginatedGainers = array_slice($gainers, $offset, $perPage);

            // Map to simpler format
            $cryptos = array_map(function($crypto) {
                return [
                    'id' => $crypto['id'],
                    'symbol' => strtoupper($crypto['symbol']),
                    'name' => $crypto['name'],
                    'current_price' => $crypto['current_price'] ?? 0,
                    'market_cap' => $crypto['market_cap'] ?? 0,
                    'market_cap_rank' => $crypto['market_cap_rank'] ?? null,
                    'price_change_percentage_24h' => $crypto['price_change_percentage_24h'] ?? 0,
                    'total_volume' => $crypto['total_volume'] ?? 0,
                    'high_24h' => $crypto['high_24h'] ?? 0,
                    'low_24h' => $crypto['low_24h'] ?? 0,
                    'image' => $crypto['image'] ?? null,
                ];
            }, $paginatedGainers);

            $currentCount = count($cryptos);
            $hasMore = $currentCount === $perPage && count($gainers) > $offset + $perPage;
            $totalGainers = count($gainers);
            $estimatedLastPage = $totalGainers > 0 ? ceil($totalGainers / $perPage) : $page;

            return response()->json([
                'success' => true,
                'page' => $page,
                'per_page' => $perPage,
                'total' => $totalGainers,
                'current_count' => $currentCount,
                'has_more' => $hasMore,
                'last_page' => $estimatedLastPage,
                'data' => $cryptos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching top gainers: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    /**
     * Get top losers (cryptos with highest 24h price decrease)
     */
    public function getTopLosers(Request $request)
    {
        try {
            $page = $request->get('page', 1);
            $perPage = min($request->get('per_page', 250), 250);
            
            $apiData = $this->apiService->getTopCryptos($page, $perPage);
            
            if (!$apiData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to fetch top losers from API',
                    'data' => []
                ], 500);
            }

            // Sort by price_change_percentage_24h ascending (lowest/most negative first)
            usort($apiData, function($a, $b) {
                $changeA = $a['price_change_percentage_24h'] ?? 0;
                $changeB = $b['price_change_percentage_24h'] ?? 0;
                return $changeA <=> $changeB; // Ascending order (most negative first)
            });

            // Filter out positive changes and take top results
            $losers = array_filter($apiData, function($crypto) {
                return ($crypto['price_change_percentage_24h'] ?? 0) < 0;
            });

            // Apply pagination
            $offset = ($page - 1) * $perPage;
            $paginatedLosers = array_slice($losers, $offset, $perPage);

            // Map to simpler format
            $cryptos = array_map(function($crypto) {
                return [
                    'id' => $crypto['id'],
                    'symbol' => strtoupper($crypto['symbol']),
                    'name' => $crypto['name'],
                    'current_price' => $crypto['current_price'] ?? 0,
                    'market_cap' => $crypto['market_cap'] ?? 0,
                    'market_cap_rank' => $crypto['market_cap_rank'] ?? null,
                    'price_change_percentage_24h' => $crypto['price_change_percentage_24h'] ?? 0,
                    'total_volume' => $crypto['total_volume'] ?? 0,
                    'high_24h' => $crypto['high_24h'] ?? 0,
                    'low_24h' => $crypto['low_24h'] ?? 0,
                    'image' => $crypto['image'] ?? null,
                ];
            }, $paginatedLosers);

            $currentCount = count($cryptos);
            $hasMore = $currentCount === $perPage && count($losers) > $offset + $perPage;
            $totalLosers = count($losers);
            $estimatedLastPage = $totalLosers > 0 ? ceil($totalLosers / $perPage) : $page;

            return response()->json([
                'success' => true,
                'page' => $page,
                'per_page' => $perPage,
                'total' => $totalLosers,
                'current_count' => $currentCount,
                'has_more' => $hasMore,
                'last_page' => $estimatedLastPage,
                'data' => $cryptos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching top losers: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}

