@extends('layouts.public')

@section('title', 'Crypto Market - Crypto Trading Platform')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">Crypto Market</h1>
            <p class="text-gray-600 dark:text-gray-400">Cryptocurrency market data</p>
        </div>
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span id="last-update">Loading...</span>
        </div>
    </div>

    <!-- Tabs -->
    <div class="mb-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button id="tab-all" class="tab-button flex-1 px-4 sm:px-6 py-3 sm:py-4 text-center font-semibold text-sm sm:text-base text-gray-700 dark:text-gray-300 border-b-2 border-blue-600 bg-blue-50 dark:bg-blue-900/20 transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900/30" data-tab="all">
                <span class="flex items-center justify-center gap-2">
                    <span>📊</span>
                    <span>All</span>
                </span>
            </button>
            <button id="tab-gainers" class="tab-button flex-1 px-4 sm:px-6 py-3 sm:py-4 text-center font-semibold text-sm sm:text-base text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 border-b-2 border-transparent transition-all duration-200 hover:bg-green-50 dark:hover:bg-green-900/20" data-tab="gainers">
                <span class="flex items-center justify-center gap-2">
                    <span class="text-green-600 dark:text-green-400 text-lg">↑</span>
                    <span>Top Gainers</span>
                </span>
            </button>
            <button id="tab-losers" class="tab-button flex-1 px-4 sm:px-6 py-3 sm:py-4 text-center font-semibold text-sm sm:text-base text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 border-b-2 border-transparent transition-all duration-200 hover:bg-red-50 dark:hover:bg-red-900/20" data-tab="losers">
                <span class="flex items-center justify-center gap-2">
                    <span class="text-red-600 dark:text-red-400 text-lg">↓</span>
                    <span>Top Losers</span>
                </span>
            </button>
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
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                            <div class="flex items-center justify-center">
                                <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="ml-3">Loading Crypto Market...</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="pagination-container" class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
            <!-- Pagination will be inserted here -->
        </div>
    </div>

</div>

@push('scripts')
<script>
    let currentPage = 1;
    let currentTab = 'all'; // 'all', 'gainers', 'losers'
    const perPage = 50; // Increased to show more cryptos per page
    const cryptoData = {};

    function formatNumber(num, decimals = 2) {
        return num.toLocaleString('en-US', {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals
        });
    }

    function formatLargeNumber(num, unit = '') {
        if (num >= 1000000000) {
            return '$' + formatNumber(num / 1000000000, 2) + 'B' + unit;
        } else if (num >= 1000000) {
            return '$' + formatNumber(num / 1000000, 1) + 'M' + unit;
        } else if (num >= 1000) {
            return '$' + formatNumber(num / 1000, 1) + 'K' + unit;
        }
        return '$' + formatNumber(num, 2) + unit;
    }

    function renderCryptoRow(crypto, index, baseIndex) {
        const rank = crypto.rank || crypto.market_cap_rank || (baseIndex + index + 1);
        const logoHtml = crypto.logo_url || crypto.image
            ? `<img src="${crypto.logo_url || crypto.image}" alt="${crypto.symbol}" class="w-10 h-10 rounded-full mr-3" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">`
            : '';
        const fallbackLogo = `<div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-3" ${logoHtml ? 'style="display:none;"' : ''}>${crypto.symbol.charAt(0)}</div>`;
        
        const changeClass = crypto.change_24h >= 0 
            ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300'
            : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300';
        const changeIcon = crypto.change_24h >= 0 ? '↑' : '↓';
        const changeSign = crypto.change_24h >= 0 ? '+' : '';
        
        const marketCap = crypto.market_cap 
            ? formatLargeNumber(crypto.market_cap)
            : 'N/A';
        
        const volume = formatLargeNumber(crypto.volume_24h || crypto.total_volume || 0);
        const high24h = crypto.high_24h ? formatNumber(crypto.high_24h, 2) : 'N/A';
        const low24h = crypto.low_24h ? formatNumber(crypto.low_24h, 2) : 'N/A';
        const price = crypto.price || crypto.current_price || 0;

        return `
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition" data-symbol="${crypto.symbol}" data-crypto-id="${crypto.id || crypto.symbol.toLowerCase()}">
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-sm font-bold text-gray-500 dark:text-gray-400">#${rank}</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        ${logoHtml}
                        ${fallbackLogo}
                        <div>
                            <div class="font-bold text-gray-900 dark:text-gray-100">${crypto.symbol}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">${crypto.name || crypto.symbol}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="price-cell" data-price="${price}">
                        <span class="text-lg font-bold text-gray-900 dark:text-gray-100">$${formatNumber(price, 2)}</span>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-3 py-1 rounded-lg text-sm font-semibold ${changeClass} change-cell" data-change="${crypto.change_24h}">
                        ${changeIcon} ${changeSign}${formatNumber(crypto.change_24h, 2)}%
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">${marketCap}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600 dark:text-gray-400">${volume}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-xs text-gray-600 dark:text-gray-400">
                        <div>H: $${high24h}</div>
                        <div>L: $${low24h}</div>
                    </div>
                </td>
            </tr>
        `;
    }

    function renderPagination(pagination) {
        const container = document.getElementById('pagination-container');
        if (!pagination) {
            container.innerHTML = '';
            return;
        }

        // Always show pagination if we have data and valid page info
        if (!pagination.current_page || pagination.current_page < 1) {
            container.innerHTML = '';
            return;
        }

        // Ensure last_page is at least current_page
        const lastPage = Math.max(pagination.last_page || pagination.current_page, pagination.current_page);

        let paginationHtml = '<div class="flex flex-col sm:flex-row items-center justify-between gap-4">';
        paginationHtml += `<div class="text-sm text-gray-700 dark:text-gray-300">`;
        if (pagination.total && pagination.total > 0) {
            paginationHtml += `Showing ${pagination.from || 0} to ${pagination.to || 0} of ${pagination.total || 'many'} results`;
        } else {
            paginationHtml += `Page ${pagination.current_page} of ${lastPage}`;
        }
        paginationHtml += `</div>`;
        paginationHtml += '<div class="flex flex-wrap items-center justify-center gap-2">';

        // Previous button
        if (pagination.current_page > 1) {
            paginationHtml += `<button onclick="loadPage(${pagination.current_page - 1})" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition">Previous</button>`;
        } else {
            paginationHtml += `<button disabled class="px-4 py-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed">Previous</button>`;
        }

        // Page numbers
        const startPage = Math.max(1, pagination.current_page - 2);
        const endPage = Math.min(lastPage, pagination.current_page + 2);

        if (startPage > 1) {
            paginationHtml += `<button onclick="loadPage(1)" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition">1</button>`;
            if (startPage > 2) {
                paginationHtml += `<span class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">...</span>`;
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            if (i === pagination.current_page) {
                paginationHtml += `<button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg">${i}</button>`;
            } else {
                paginationHtml += `<button onclick="loadPage(${i})" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition">${i}</button>`;
            }
        }

        if (endPage < lastPage) {
            if (endPage < lastPage - 1) {
                paginationHtml += `<span class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">...</span>`;
            }
            paginationHtml += `<button onclick="loadPage(${lastPage})" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition">${lastPage}</button>`;
        }

        // Next button - show if we have more data or if has_more is true
        const hasMore = pagination.has_more !== false;
        const canGoNext = pagination.current_page < lastPage || hasMore;
        if (canGoNext) {
            paginationHtml += `<button onclick="loadPage(${pagination.current_page + 1})" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition">Next</button>`;
        } else {
            paginationHtml += `<button disabled class="px-4 py-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed">Next</button>`;
        }

        paginationHtml += '</div></div>';
        container.innerHTML = paginationHtml;
    }

    function getApiEndpoint() {
        switch(currentTab) {
            case 'gainers':
                return '/api/cryptos/top/gainers';
            case 'losers':
                return '/api/cryptos/top/losers';
            default:
                return '/api/cryptos/top';
        }
    }

    function loadCryptoData(page = 1) {
        // Use the appropriate endpoint based on current tab
        const endpoint = getApiEndpoint();
        
        axios.get(endpoint, {
            params: {
                page: page,
                per_page: perPage
            }
        })
        .then(response => {
            const data = response.data;
            const tbody = document.getElementById('crypto-table-body');
            
            // Full render
            if (data.success && data.data && data.data.length > 0) {
                    let rowsHtml = '';
                    const baseIndex = (data.page - 1) * data.per_page;
                    
                    data.data.forEach((crypto, index) => {
                        // Map API response to our format
                        const cryptoRow = {
                            id: crypto.id || crypto.symbol.toLowerCase(),
                            symbol: crypto.symbol,
                            name: crypto.name,
                            price: crypto.current_price || 0,
                            change_24h: crypto.price_change_percentage_24h || 0,
                            market_cap: crypto.market_cap || 0,
                            volume_24h: crypto.total_volume || 0,
                            high_24h: crypto.high_24h || 0,
                            low_24h: crypto.low_24h || 0,
                            rank: crypto.market_cap_rank || (baseIndex + index + 1),
                            logo_url: crypto.image || null
                        };
                        
                        rowsHtml += renderCryptoRow(cryptoRow, index, baseIndex);
                        // Store crypto data for price updates using symbol as key
                        cryptoData[cryptoRow.symbol] = {
                            id: cryptoRow.id,
                            symbol: cryptoRow.symbol,
                            price: parseFloat(cryptoRow.price),
                            change: parseFloat(cryptoRow.change_24h),
                            row: null
                        };
                    });
                    
                    tbody.innerHTML = rowsHtml;
                    
                    // Re-attach row references
                    data.data.forEach((crypto, index) => {
                        const symbol = crypto.symbol;
                        const row = document.querySelector(`[data-symbol="${symbol}"]`);
                        if (row && cryptoData[symbol]) {
                            cryptoData[symbol].row = row;
                            cryptoData[symbol].priceElement = row.querySelector('.price-cell span');
                            cryptoData[symbol].changeElement = row.querySelector('.change-cell');
                        }
                    });
                    
                    // Create pagination data structure
                    const lastPage = data.last_page || Math.max(Math.ceil((data.total || data.current_count || data.data.length) / data.per_page), data.page);
                    const paginationData = {
                        current_page: data.page || 1,
                        last_page: lastPage,
                        per_page: data.per_page || perPage,
                        total: data.total || data.current_count || data.data.length,
                        from: baseIndex + 1,
                        to: baseIndex + data.data.length,
                        has_more: data.has_more !== false && data.data.length === data.per_page
                    };
                    
                    // Always render pagination if we have data
                    if (paginationData.current_page && paginationData.current_page > 0) {
                        renderPagination(paginationData);
                    }
                    currentPage = data.page;
                } else {
                    tbody.innerHTML = '<tr><td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No Crypto Market found.</td></tr>';
                    renderPagination(null);
                }

            const now = new Date();
            document.getElementById('last-update').textContent = `Last updated: ${now.toLocaleTimeString()}`;
        })
        .catch(error => {
            console.error('Error loading crypto data:', error);
            const tbody = document.getElementById('crypto-table-body');
            tbody.innerHTML = '<tr><td colspan="7" class="px-6 py-4 text-center text-red-500 dark:text-red-400">Error loading data. Please refresh the page.</td></tr>';
        });
    }

    function loadPage(page) {
        currentPage = page;
        loadCryptoData(page);
    }

    // Make loadPage available globally
    window.loadPage = loadPage;

    // Tab switching functionality
    function switchTab(tab) {
        currentTab = tab;
        currentPage = 1;
        
        // Update tab buttons
        document.querySelectorAll('.tab-button').forEach(btn => {
            const tabName = btn.dataset.tab;
            if (tabName === tab) {
                // Active tab
                if (tab === 'gainers') {
                    btn.classList.add('border-green-600', 'bg-green-50', 'dark:bg-green-900/20', 'text-gray-700', 'dark:text-gray-300');
                } else if (tab === 'losers') {
                    btn.classList.add('border-red-600', 'bg-red-50', 'dark:bg-red-900/20', 'text-gray-700', 'dark:text-gray-300');
                } else {
                    btn.classList.add('border-blue-600', 'bg-blue-50', 'dark:bg-blue-900/20', 'text-gray-700', 'dark:text-gray-300');
                }
                btn.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400', 'hover:bg-green-50', 'hover:bg-red-50', 'dark:hover:bg-green-900/20', 'dark:hover:bg-red-900/20');
            } else {
                // Inactive tabs
                btn.classList.remove('border-blue-600', 'border-green-600', 'border-red-600', 'bg-blue-50', 'bg-green-50', 'bg-red-50', 'dark:bg-blue-900/20', 'dark:bg-green-900/20', 'dark:bg-red-900/20', 'text-gray-700', 'dark:text-gray-300');
                btn.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400');
            }
        });

        // Clear crypto data cache
        Object.keys(cryptoData).forEach(key => delete cryptoData[key]);

        // Reload data for new tab
        loadCryptoData(currentPage);
    }

    // Initial load and setup polling
    document.addEventListener('DOMContentLoaded', function() {
        // Set up tab click handlers
        document.getElementById('tab-all').addEventListener('click', () => switchTab('all'));
        document.getElementById('tab-gainers').addEventListener('click', () => switchTab('gainers'));
        document.getElementById('tab-losers').addEventListener('click', () => switchTab('losers'));

        // Initial load
        loadCryptoData(currentPage);
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
