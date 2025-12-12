@extends('layouts.public')

@section('title', 'Crypto Trading Platform - Trade Crypto Market with Ease')

@section('content')
<!-- Hero Section with Animated Background -->
<section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 min-h-screen flex items-center">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent via-transparent to-black/20"></div>
    </div>
    
    <!-- Animated floating elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="text-center">
            <!-- Trust Badge -->
            <div class="inline-flex items-center mb-6 px-6 py-3 bg-white/10 backdrop-blur-md rounded-full text-white text-sm font-medium border border-white/20 shadow-lg">
                <svg class="w-5 h-5 mr-2 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Trusted by 50,000+ Traders Worldwide
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold text-white mb-8 leading-tight">
                <span class="block mb-2">Trade Crypto Market</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-orange-300 to-pink-300 animate-gradient">
                    Like a Pro
                </span>
            </h1>
            
            <!-- Subheading -->
            <p class="mt-6 text-xl sm:text-2xl md:text-3xl text-blue-100 max-w-4xl mx-auto leading-relaxed font-light">
                The most advanced crypto trading platform. Buy, sell, and manage your cryptocurrency portfolio with ease. 
                <span class="font-semibold text-white">Start your journey today.</span>
            </p>
            
            <!-- CTA Buttons -->
            <div class="mt-12 flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('cryptos.public') }}" class="group relative px-10 py-5 bg-white text-blue-600 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-2 overflow-hidden">
                    <span class="relative z-10 flex items-center">
                        Browse Crypto Market
                        <svg class="ml-3 w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
                </a>
                <a href="{{ route('features') }}" class="group px-10 py-5 bg-transparent border-3 border-white text-white rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 backdrop-blur-sm shadow-xl">
                    Explore Features
                </a>
            </div>
            
            <!-- Trust Indicators -->
            <div class="mt-16 flex flex-wrap justify-center gap-8 text-white/90">
                <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-md px-6 py-3 rounded-lg border border-white/20">
                    <svg class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">No Hidden Fees</span>
                </div>
                <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-md px-6 py-3 rounded-lg border border-white/20">
                    <svg class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">Instant Trading</span>
                </div>
                <div class="flex items-center space-x-3 bg-white/10 backdrop-blur-md px-6 py-3 rounded-lg border border-white/20">
                    <svg class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Stats Section with Animated Numbers -->
<section class="py-20 bg-white dark:bg-gray-800 border-b-4 border-blue-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform duration-300">50K+</div>
                <div class="text-gray-600 dark:text-gray-400 font-semibold text-lg">Active Traders</div>
                <div class="mt-2 h-1 w-20 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>
            <div class="text-center group">
                <div class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform duration-300">$2B+</div>
                <div class="text-gray-600 dark:text-gray-400 font-semibold text-lg">Trading Volume</div>
                <div class="mt-2 h-1 w-20 bg-gradient-to-r from-green-500 to-teal-500 mx-auto rounded-full"></div>
            </div>
            <div class="text-center group">
                <div class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform duration-300">150+</div>
                <div class="text-gray-600 dark:text-gray-400 font-semibold text-lg">Crypto Market</div>
                <div class="mt-2 h-1 w-20 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
            </div>
            <div class="text-center group">
                <div class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent mb-3 group-hover:scale-110 transition-transform duration-300">99.9%</div>
                <div class="text-gray-600 dark:text-gray-400 font-semibold text-lg">Uptime</div>
                <div class="mt-2 h-1 w-20 bg-gradient-to-r from-orange-500 to-red-500 mx-auto rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section with Advanced Cards -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-5">
        <div class="absolute top-20 left-20 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400 rounded-full text-sm font-semibold mb-4">WHY CHOOSE US</div>
            <h2 class="text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">
                Everything You Need to
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Succeed</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto leading-relaxed">
                Powerful features designed for traders of all levels. From beginners to professionals.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group relative bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 border-2 border-transparent hover:border-blue-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500/10 to-transparent rounded-bl-full"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Easy Trading</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        Buy and sell Crypto Market with just a few clicks. Our intuitive interface makes trading simple for beginners and powerful for experts. No technical knowledge required.
                    </p>
                    <div class="flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:translate-x-2 transition-transform">
                        Learn more
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="group relative bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 border-2 border-transparent hover:border-green-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-500/10 to-transparent rounded-bl-full"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Portfolio Tracking</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        Monitor your investments in real-time with advanced analytics. Track profits, losses, and performance metrics with detailed charts and insights.
                    </p>
                    <div class="flex items-center text-green-600 dark:text-green-400 font-semibold group-hover:translate-x-2 transition-transform">
                        Learn more
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="group relative bg-white dark:bg-gray-800 p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 border-2 border-transparent hover:border-purple-500">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-500/10 to-transparent rounded-bl-full"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Secure & Safe</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                        Your data and transactions are protected with industry-leading security measures, encryption protocols, and multi-factor authentication.
                    </p>
                    <div class="flex items-center text-purple-600 dark:text-purple-400 font-semibold group-hover:translate-x-2 transition-transform">
                        Learn more
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-24 bg-white dark:bg-gray-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-2 bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-400 rounded-full text-sm font-semibold mb-4">HOW IT WORKS</div>
            <h2 class="text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">
                Get Started in
                <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Three Steps</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400">Simple, fast, and secure</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
            <!-- Connecting Line -->
            <div class="hidden md:block absolute top-20 left-1/3 right-1/3 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 transform -translate-y-1/2"></div>
            
            <div class="relative text-center group">
                <div class="relative inline-block mb-8">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        1
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Create Account</h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                    Sign up in seconds with just your email. No credit card required to get started. Verify your account and you're ready to go.
                </p>
            </div>
            <div class="relative text-center group">
                <div class="relative inline-block mb-8">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        2
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Browse & Research</h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                    Explore 150+ Crypto Market with real-time prices, charts, and comprehensive market data. Make informed decisions.
                </p>
            </div>
            <div class="relative text-center group">
                <div class="relative inline-block mb-8">
                    <div class="absolute inset-0 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        3
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Start Trading</h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                    Buy and sell instantly. Track your portfolio and grow your investments with our powerful tools and analytics.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Top Crypto Market Preview -->
<section class="py-24 bg-gradient-to-b from-gray-50 via-white to-gray-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-2 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-400 rounded-full text-sm font-semibold mb-4">MARKET LEADERS</div>
            <h2 class="text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">
                Popular <span class="bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent">Crypto Market</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400">Trade the most popular digital assets with real-time market data</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="top-cryptos-grid">
            @php
                $topCryptos = \App\Models\Crypto::orderBy('rank', 'asc')->take(8)->get();
            @endphp
            @foreach($topCryptos as $crypto)
                <div class="group bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-blue-500 relative overflow-hidden" data-symbol="{{ $crypto->symbol }}">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-500/10 to-transparent rounded-bl-full"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                @if($crypto->logo_url)
                                    <img src="{{ $crypto->logo_url }}" alt="{{ $crypto->symbol }}" class="w-14 h-14 rounded-xl shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                                @else
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                                        {{ substr($crypto->symbol, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <h3 class="font-bold text-xl text-gray-900 dark:text-gray-100">{{ $crypto->symbol }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $crypto->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-3 pt-4 border-t-2 border-gray-100 dark:border-gray-700">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">Price</span>
                                <span class="font-bold text-xl text-gray-900 dark:text-gray-100 price-display" data-price="{{ $crypto->price }}">${{ number_format($crypto->price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">24h Change</span>
                                <span class="font-semibold px-3 py-1 rounded-lg text-sm change-display {{ $crypto->change_24h >= 0 ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300' }}" data-change="{{ $crypto->change_24h }}">
                                    {{ $crypto->change_24h >= 0 ? '↑' : '↓' }} {{ $crypto->change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->change_24h, 2) }}%
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">Market Cap</span>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">${{ $crypto->market_cap ? number_format($crypto->market_cap / 1000000000, 2) . 'B' : 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">Volume</span>
                                <span class="text-sm font-bold text-gray-700 dark:text-gray-300">${{ number_format($crypto->volume_24h / 1000000, 1) }}M</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('cryptos.public') }}" class="inline-flex items-center px-10 py-5 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-xl font-bold text-lg transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                View All Crypto Market
                <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block px-4 py-2 bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-400 rounded-full text-sm font-semibold mb-4">TESTIMONIALS</div>
            <h2 class="text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-gray-100 mb-6">
                What Our <span class="bg-gradient-to-r from-yellow-600 to-orange-600 bg-clip-text text-transparent">Users Say</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400">Join thousands of satisfied traders</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'John Doe', 'role' => 'Professional Trader', 'initials' => 'JD', 'color' => 'from-blue-500 to-purple-600', 'text' => '"The best platform I\'ve used for crypto trading. Clean interface, fast execution, and excellent customer support!"'],
                ['name' => 'Sarah Miller', 'role' => 'Crypto Enthusiast', 'initials' => 'SM', 'color' => 'from-green-500 to-teal-600', 'text' => '"Love the portfolio tracking feature! It helps me make informed decisions and track my profits easily."'],
                ['name' => 'Mike Wilson', 'role' => 'Day Trader', 'initials' => 'MW', 'color' => 'from-purple-500 to-pink-600', 'text' => '"Fast execution, low fees, and great UI. This platform has everything I need for successful trading."']
            ] as $testimonial)
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br {{ $testimonial['color'] }} rounded-full flex items-center justify-center text-white font-bold text-xl mr-4 shadow-lg">
                            {{ $testimonial['initials'] }}
                        </div>
                        <div>
                            <div class="font-bold text-lg text-gray-900 dark:text-gray-100">{{ $testimonial['name'] }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $testimonial['role'] }}</div>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 italic leading-relaxed text-lg">{{ $testimonial['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 left-20 w-96 h-96 bg-white rounded-full mix-blend-overlay opacity-10 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-white rounded-full mix-blend-overlay opacity-10 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-5xl md:text-6xl font-extrabold text-white mb-6">Ready to Start Trading?</h2>
        <p class="text-2xl md:text-3xl text-blue-100 mb-12 max-w-3xl mx-auto leading-relaxed">
            Join thousands of traders and start your crypto journey today. No credit card required.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('cryptos.public') }}" class="group relative px-12 py-6 bg-white text-blue-600 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/50 transform hover:-translate-y-2 overflow-hidden">
                <span class="relative z-10 flex items-center">
                    Browse Crypto Market
                    <svg class="ml-3 w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
            </a>
            <a href="{{ route('features') }}" class="px-12 py-6 bg-transparent border-3 border-white text-white rounded-xl font-bold text-xl hover:bg-white hover:text-blue-600 transition-all duration-300 backdrop-blur-sm shadow-xl">
                Explore Features
            </a>
        </div>
    </div>
</section>

@push('styles')
<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    @keyframes gradient {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }
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

@push('scripts')
<script>
    let priceUpdateInterval;
    const cryptoData = {};

    // Initialize crypto data from DOM
    document.querySelectorAll('#top-cryptos-grid [data-symbol]').forEach(card => {
        const symbol = card.dataset.symbol;
        const priceElement = card.querySelector('.price-display');
        const changeElement = card.querySelector('.change-display');
        
        if (priceElement && changeElement) {
            cryptoData[symbol] = {
                price: parseFloat(priceElement.dataset.price),
                change: parseFloat(changeElement.dataset.change),
                card: card,
                priceElement: priceElement,
                changeElement: changeElement
            };
        }
    });

    function updatePrices() {
        axios.get('/api/cryptos/realtime')
            .then(response => {
                const cryptos = response.data;
                
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
                                setTimeout(() => data.priceElement.classList.remove('price-increase'), 2000);
                            } else if (newPrice < oldPrice) {
                                data.priceElement.classList.add('price-decrease');
                                setTimeout(() => data.priceElement.classList.remove('price-decrease'), 2000);
                            }
                            setTimeout(() => data.priceElement.classList.remove('price-updated'), 2000);
                        }

                        // Update price display
                        data.price = newPrice;
                        data.priceElement.textContent = '$' + newPrice.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        data.priceElement.dataset.price = newPrice;

                        // Update change
                        if (data.change !== newChange) {
                            data.change = newChange;
                            const isPositive = newChange >= 0;
                            data.changeElement.className = `font-semibold px-3 py-1 rounded-lg text-sm change-display ${isPositive ? 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300'}`;
                            data.changeElement.innerHTML = `${isPositive ? '↑' : '↓'} ${isPositive ? '+' : ''}${newChange.toFixed(2)}%`;
                            data.changeElement.dataset.change = newChange;
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
@endsection
