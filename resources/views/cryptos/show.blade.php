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
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                                {{ substr($crypto->symbol, 0, 1) }}
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $crypto->name }}</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $crypto->symbol }}</p>
                            <div class="space-y-2">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Current Price</p>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">${{ number_format($crypto->price, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">24h Change</p>
                                    <p class="text-lg font-semibold {{ $crypto->change_24h >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                        {{ $crypto->change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->change_24h, 2) }}%
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">24h Volume</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">${{ number_format($crypto->volume_24h, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trading Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-6">Place Order</h3>
                        
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
                                <input type="number" id="price_input" step="0.01" min="0" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm"
                                    value="{{ $crypto->price }}">
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Total</span>
                                    <span id="total_amount" class="text-xl font-bold text-gray-900 dark:text-gray-100">$0.00</span>
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
        });
    </script>
    @endpush
</x-app-layout>

