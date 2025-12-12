<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crypto Market') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Symbol</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">24h Change</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">24h Volume</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700" id="crypto-table-body">
                                @forelse($cryptos as $crypto)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700" data-crypto-id="{{ $crypto->id }}" data-symbol="{{ $crypto->symbol }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if($crypto->logo_url)
                                                    <img src="{{ $crypto->logo_url }}" alt="{{ $crypto->symbol }}" class="w-10 h-10 rounded-full mr-3">
                                                @else
                                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                                        {{ substr($crypto->symbol, 0, 1) }}
                                                    </div>
                                                @endif
                                                <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $crypto->symbol }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $crypto->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-gray-900 dark:text-gray-100 font-semibold price-cell" data-price="{{ $crypto->price }}">${{ number_format($crypto->price, 2) }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 rounded-full text-sm font-medium change-cell {{ $crypto->change_24h >= 0 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}" data-change="{{ $crypto->change_24h }}">
                                                {{ $crypto->change_24h >= 0 ? '↑' : '↓' }} {{ $crypto->change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->change_24h, 2) }}%
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">${{ number_format($crypto->volume_24h / 1000000, 1) }}M</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('cryptos.show', $crypto) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Trade
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No Crypto Market found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $cryptos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let priceUpdateInterval;
        const cryptoData = {};

        // Initialize crypto data from DOM
        document.querySelectorAll('#crypto-table-body tr[data-crypto-id]').forEach(row => {
            const cryptoId = row.dataset.cryptoId;
            const symbol = row.dataset.symbol;
            const priceCell = row.querySelector('.price-cell');
            const changeCell = row.querySelector('.change-cell');
            
            if (priceCell && changeCell) {
                cryptoData[cryptoId] = {
                    symbol: symbol,
                    price: parseFloat(priceCell.dataset.price),
                    change: parseFloat(changeCell.dataset.change),
                    row: row,
                    priceCell: priceCell,
                    changeCell: changeCell
                };
            }
        });

        function updatePrices() {
            axios.get('/api/cryptos/realtime')
                .then(response => {
                    const cryptos = response.data;
                    
                    cryptos.forEach(crypto => {
                        const cryptoId = crypto.id.toString();
                        if (cryptoData[cryptoId]) {
                            const data = cryptoData[cryptoId];
                            const oldPrice = data.price;
                            const newPrice = parseFloat(crypto.price);
                            const newChange = parseFloat(crypto.change_24h);

                            // Update price with animation
                            if (oldPrice !== newPrice) {
                                data.priceCell.classList.add('price-updated');
                                if (newPrice > oldPrice) {
                                    data.priceCell.classList.add('price-increase');
                                    setTimeout(() => data.priceCell.classList.remove('price-increase'), 2000);
                                } else if (newPrice < oldPrice) {
                                    data.priceCell.classList.add('price-decrease');
                                    setTimeout(() => data.priceCell.classList.remove('price-decrease'), 2000);
                                }
                                setTimeout(() => data.priceCell.classList.remove('price-updated'), 2000);
                            }

                            // Update price display
                            data.price = newPrice;
                            data.priceCell.textContent = '$' + newPrice.toLocaleString('en-US', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                            data.priceCell.dataset.price = newPrice;

                            // Update change
                            if (data.change !== newChange) {
                                data.change = newChange;
                                const isPositive = newChange >= 0;
                                data.changeCell.className = `px-2 py-1 rounded-full text-sm font-medium change-cell ${isPositive ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'}`;
                                data.changeCell.innerHTML = `${isPositive ? '↑' : '↓'} ${isPositive ? '+' : ''}${newChange.toFixed(2)}%`;
                                data.changeCell.dataset.change = newChange;
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
    @endpush

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
</x-app-layout>

