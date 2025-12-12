<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Trade') }} - {{ $crypto->symbol }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Crypto Info Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="text-center mb-6">
                            @if($crypto->logo_url)
                                <img src="{{ $crypto->logo_url }}" alt="{{ $crypto->symbol }}" class="w-24 h-24 rounded-full mx-auto mb-4 shadow-lg">
                            @else
                                <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-4 shadow-lg">
                                    {{ substr($crypto->symbol, 0, 1) }}
                                </div>
                            @endif
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $crypto->name }}</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-2">{{ $crypto->symbol }}</p>
                            @if($crypto->rank)
                                <span class="inline-block px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400 rounded-full text-sm font-semibold">
                                    Rank #{{ $crypto->rank }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="space-y-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Current Price</span>
                                <span class="text-2xl font-bold text-gray-900 dark:text-gray-100 price-display" data-price="{{ $crypto->price }}" data-crypto-id="{{ $crypto->id }}">${{ number_format($crypto->price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">24h Change</span>
                                <span class="text-lg font-semibold change-display {{ $crypto->change_24h >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}" data-change="{{ $crypto->change_24h }}">
                                    {{ $crypto->change_24h >= 0 ? '↑' : '↓' }} {{ $crypto->change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->change_24h, 2) }}%
                                </span>
                            </div>
                            @if($crypto->market_cap)
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Market Cap</span>
                                <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">${{ number_format($crypto->market_cap / 1000000000, 2) }}B</span>
                            </div>
                            @endif
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">24h Volume</span>
                                <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">${{ number_format($crypto->volume_24h / 1000000, 1) }}M</span>
                            </div>
                            @if($crypto->high_24h && $crypto->low_24h)
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">24h High</span>
                                    <span class="text-sm font-semibold text-green-600 dark:text-green-400">${{ number_format($crypto->high_24h, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">24h Low</span>
                                    <span class="text-sm font-semibold text-red-600 dark:text-red-400">${{ number_format($crypto->low_24h, 2) }}</span>
                                </div>
                            </div>
                            @endif
                            @if($crypto->circulating_supply)
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Circulating Supply</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ number_format($crypto->circulating_supply / 1000000, 1) }}M</span>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-center space-x-2 text-xs text-gray-500 dark:text-gray-400">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span id="price-update-status">Live prices updating...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trading Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Place Order</h3>
                            <button type="button" id="refresh-price" class="px-3 py-1 text-sm bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition">
                                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Refresh Price
                            </button>
                        </div>
                        
                        <form id="tradeForm" class="space-y-6">
                            @csrf
                            <input type="hidden" name="crypto_id" value="{{ $crypto->id }}">
                            <input type="hidden" name="price" id="current_price" value="{{ $crypto->price }}">

                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Order Type</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <button type="button" id="buyBtn" class="order-type-btn px-4 py-3 rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition" data-type="buy">
                                        Buy
                                    </button>
                                    <button type="button" id="sellBtn" class="order-type-btn px-4 py-3 rounded-lg font-semibold bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 transition" data-type="sell">
                                        Sell
                                    </button>
                                </div>
                                <input type="hidden" name="type" id="order_type" value="buy">
                            </div>

                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                                <input type="number" id="quantity" name="quantity" step="0.00000001" min="0.00000001" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm"
                                    placeholder="0.00000000">
                            </div>

                            <div>
                                <label for="price_input" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Price per Coin</label>
                                <div class="relative">
                                    <input type="number" id="price_input" step="0.01" min="0" required
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm"
                                        value="{{ $crypto->price }}">
                                    <button type="button" id="use-current-price" class="absolute right-2 top-1/2 transform -translate-y-1/2 px-2 py-1 text-xs bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400 rounded hover:bg-blue-200 dark:hover:bg-blue-800 transition">
                                        Use Current
                                    </button>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 p-4 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Total</span>
                                    <span id="total_amount" class="text-2xl font-bold text-gray-900 dark:text-gray-100">$0.00</span>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buyBtn = document.getElementById('buyBtn');
            const sellBtn = document.getElementById('sellBtn');
            const orderTypeInput = document.getElementById('order_type');
            const quantityInput = document.getElementById('quantity');
            const priceInput = document.getElementById('price_input');
            const currentPriceInput = document.getElementById('current_price');
            const totalAmount = document.getElementById('total_amount');
            const tradeForm = document.getElementById('tradeForm');
            const priceDisplay = document.querySelector('.price-display');
            const changeDisplay = document.querySelector('.change-display');
            const refreshBtn = document.getElementById('refresh-price');
            const useCurrentBtn = document.getElementById('use-current-price');
            const cryptoId = priceDisplay.dataset.cryptoId;

            let currentPrice = parseFloat(priceDisplay.dataset.price);
            let priceUpdateInterval;

            // Order type buttons
            document.querySelectorAll('.order-type-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const type = this.dataset.type;
                    orderTypeInput.value = type;
                    
                    document.querySelectorAll('.order-type-btn').forEach(b => {
                        b.classList.remove('bg-green-600', 'text-white', 'hover:bg-green-700');
                        b.classList.remove('bg-red-600', 'text-white', 'hover:bg-red-700');
                        b.classList.add('bg-gray-300', 'dark:bg-gray-600', 'text-gray-700', 'dark:text-gray-300', 'hover:bg-gray-400', 'dark:hover:bg-gray-500');
                    });
                    
                    if (type === 'buy') {
                        this.classList.remove('bg-gray-300', 'dark:bg-gray-600', 'text-gray-700', 'dark:text-gray-300', 'hover:bg-gray-400', 'dark:hover:bg-gray-500');
                        this.classList.add('bg-green-600', 'text-white', 'hover:bg-green-700');
                    } else {
                        this.classList.remove('bg-gray-300', 'dark:bg-gray-600', 'text-gray-700', 'dark:text-gray-300', 'hover:bg-gray-400', 'dark:hover:bg-gray-500');
                        this.classList.add('bg-red-600', 'text-white', 'hover:bg-red-700');
                    }
                });
            });

            // Use current price button
            useCurrentBtn.addEventListener('click', function() {
                priceInput.value = currentPrice.toFixed(2);
                currentPriceInput.value = currentPrice;
                calculateTotal();
            });

            // Refresh price button
            refreshBtn.addEventListener('click', function() {
                updatePrice();
            });

            // Update price function
            function updatePrice() {
                axios.get(`/api/cryptos/${cryptoId}`)
                    .then(response => {
                        const crypto = response.data;
                        const oldPrice = currentPrice;
                        currentPrice = parseFloat(crypto.price);
                        const newChange = parseFloat(crypto.change_24h);

                        // Animate price change
                        if (oldPrice !== currentPrice) {
                            priceDisplay.classList.add('price-updated');
                            if (currentPrice > oldPrice) {
                                priceDisplay.classList.add('price-increase');
                            } else {
                                priceDisplay.classList.add('price-decrease');
                            }
                            setTimeout(() => {
                                priceDisplay.classList.remove('price-updated', 'price-increase', 'price-decrease');
                            }, 2000);
                        }

                        // Update displays
                        priceDisplay.textContent = '$' + currentPrice.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        priceDisplay.dataset.price = currentPrice;

                        const isPositive = newChange >= 0;
                        changeDisplay.className = `text-lg font-semibold change-display ${isPositive ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'}`;
                        changeDisplay.innerHTML = `${isPositive ? '↑' : '↓'} ${isPositive ? '+' : ''}${newChange.toFixed(2)}%`;

                        // Update price input if it matches old price
                        if (parseFloat(priceInput.value) === oldPrice) {
                            priceInput.value = currentPrice.toFixed(2);
                            currentPriceInput.value = currentPrice;
                            calculateTotal();
                        }

                        document.getElementById('price-update-status').textContent = 'Updated: ' + new Date().toLocaleTimeString();
                    })
                    .catch(error => {
                        console.error('Error updating price:', error);
                    });
            }

            // Calculate total
            function calculateTotal() {
                const quantity = parseFloat(quantityInput.value) || 0;
                const price = parseFloat(priceInput.value) || 0;
                const total = quantity * price;
                totalAmount.textContent = '$' + total.toFixed(2);
            }

            quantityInput.addEventListener('input', calculateTotal);
            priceInput.addEventListener('input', function() {
                currentPriceInput.value = this.value;
                calculateTotal();
            });

            // Auto-update price every 30 seconds
            priceUpdateInterval = setInterval(updatePrice, 30000);

            // Form submission
            tradeForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const data = {
                    crypto_id: formData.get('crypto_id'),
                    type: formData.get('type'),
                    quantity: parseFloat(formData.get('quantity')),
                    price: parseFloat(formData.get('price')),
                };

                try {
                    const response = await axios.post('{{ route("transactions.store") }}', data);
                    
                    if (response.data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.data.message,
                            confirmButtonColor: '#4F46E5',
                        }).then(() => {
                            window.location.href = '{{ route("dashboard") }}';
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: error.response?.data?.message || 'Transaction failed',
                        confirmButtonColor: '#EF4444',
                    });
                }
            });

            // Cleanup
            window.addEventListener('beforeunload', function() {
                if (priceUpdateInterval) {
                    clearInterval(priceUpdateInterval);
                }
            });
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
