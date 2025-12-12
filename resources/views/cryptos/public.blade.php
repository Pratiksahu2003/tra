@extends('layouts.public')

@section('title', 'Cryptocurrencies - Crypto Trading Platform')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">All Cryptocurrencies</h1>
            <p class="text-gray-600 dark:text-gray-400">Real-time prices updated every 30 seconds</p>
        </div>
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span id="last-update">Live</span>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Rank</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Crypto</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">24h Change</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Market Cap</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">24h Volume</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">24h Range</th>
                    </tr>
                </thead>
                <tbody id="crypto-table-body" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($cryptos as $index => $crypto)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition" data-symbol="{{ $crypto->symbol }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-bold text-gray-500 dark:text-gray-400">#{{ $crypto->rank ?? (($cryptos->currentPage() - 1) * $cryptos->perPage() + $index + 1) }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($crypto->logo_url)
                                        <img src="{{ $crypto->logo_url }}" alt="{{ $crypto->symbol }}" class="w-10 h-10 rounded-full mr-3">
                                    @else
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                            {{ substr($crypto->symbol, 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-900 dark:text-gray-100">{{ $crypto->symbol }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $crypto->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="price-cell" data-price="{{ $crypto->price }}">
                                    <span class="text-lg font-bold text-gray-900 dark:text-gray-100">${{ number_format($crypto->price, 2) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 rounded-lg text-sm font-semibold {{ $crypto->change_24h >= 0 ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300' }} change-cell" data-change="{{ $crypto->change_24h }}">
                                    {{ $crypto->change_24h >= 0 ? '↑' : '↓' }} {{ $crypto->change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->change_24h, 2) }}%
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    ${{ $crypto->market_cap ? number_format($crypto->market_cap / 1000000000, 2) . 'B' : 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    ${{ number_format($crypto->volume_24h / 1000000, 1) }}M
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-xs text-gray-600 dark:text-gray-400">
                                    <div>H: ${{ $crypto->high_24h ? number_format($crypto->high_24h, 2) : 'N/A' }}</div>
                                    <div>L: ${{ $crypto->low_24h ? number_format($crypto->low_24h, 2) : 'N/A' }}</div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No cryptocurrencies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
            {{ $cryptos->links() }}
        </div>
    </div>

    @guest
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 border-2 border-blue-200 dark:border-blue-800 rounded-xl p-8 text-center">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">Ready to Start Trading?</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Create a free account to buy and sell cryptocurrencies with real-time prices</p>
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-lg font-semibold transition shadow-lg hover:shadow-xl">
                Create Free Account
            </a>
        </div>
    @endguest
</div>

@push('scripts')
<script>
    let priceUpdateInterval;
    const cryptoData = {};

    // Initialize crypto data
    document.querySelectorAll('[data-symbol]').forEach(row => {
        const symbol = row.dataset.symbol;
        const priceCell = row.querySelector('.price-cell');
        const changeCell = row.querySelector('.change-cell');
        
        if (priceCell && changeCell) {
            cryptoData[symbol] = {
                price: parseFloat(priceCell.dataset.price),
                change: parseFloat(changeCell.dataset.change),
                row: row,
                priceElement: priceCell.querySelector('span'),
                changeElement: changeCell
            };
        }
    });

    function updatePrices() {
        axios.get('/api/cryptos/realtime')
            .then(response => {
                const cryptos = response.data;
                const now = new Date();
                document.getElementById('last-update').textContent = `Updated: ${now.toLocaleTimeString()}`;

                cryptos.forEach(crypto => {
                    if (cryptoData[crypto.symbol]) {
                        const data = cryptoData[crypto.symbol];
                        const oldPrice = data.price;
                        const newPrice = parseFloat(crypto.price);
                        const newChange = parseFloat(crypto.change_24h);

                        // Update price with animation
                        if (oldPrice !== newPrice) {
                            data.priceElement.classList.add('price-updated');
                            if (newPrice > oldPrice) {
                                data.priceElement.classList.add('price-increase');
                            } else if (newPrice < oldPrice) {
                                data.priceElement.classList.add('price-decrease');
                            }
                            
                            setTimeout(() => {
                                data.priceElement.classList.remove('price-updated', 'price-increase', 'price-decrease');
                            }, 2000);
                        }

                        // Update price display
                        data.price = newPrice;
                        data.priceElement.textContent = '$' + newPrice.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });

                        // Update change
                        if (data.change !== newChange) {
                            data.change = newChange;
                            const isPositive = newChange >= 0;
                            data.changeElement.className = `px-3 py-1 rounded-lg text-sm font-semibold ${isPositive ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300'}`;
                            data.changeElement.innerHTML = `${isPositive ? '↑' : '↓'} ${isPositive ? '+' : ''}${newChange.toFixed(2)}%`;
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error updating prices:', error);
            });
    }

    // Update prices every 30 seconds
    document.addEventListener('DOMContentLoaded', function() {
        updatePrices();
        priceUpdateInterval = setInterval(updatePrices, 30000);
    });

    // Cleanup on page unload
    window.addEventListener('beforeunload', function() {
        if (priceUpdateInterval) {
            clearInterval(priceUpdateInterval);
        }
    });
</script>

@push('styles')
<style>
    .price-updated {
        animation: priceFlash 0.5s ease-in-out;
    }
    
    .price-increase {
        color: #10b981 !important;
    }
    
    .price-decrease {
        color: #ef4444 !important;
    }
    
    @keyframes priceFlash {
        0%, 100% { background-color: transparent; }
        50% { background-color: rgba(59, 130, 246, 0.2); }
    }
</style>
@endpush
@endpush
@endsection
