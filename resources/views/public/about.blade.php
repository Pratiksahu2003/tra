@extends('layouts.public')

@section('title', 'About Us - Crypto Trading Platform')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">About Trading Floor</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Building the future of cryptocurrency trading, making it accessible and secure for everyone.
        </p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl shadow-lg">
                <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Our Mission</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                    Our mission is to democratize cryptocurrency trading by providing a user-friendly, secure, and transparent platform that empowers individuals to take control of their financial future.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    We believe that everyone should have access to the tools and information needed to participate in the digital economy, regardless of their technical expertise or financial background.
                </p>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl shadow-lg">
                <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Our Vision</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                    We envision a world where cryptocurrency trading is as simple and accessible as traditional online banking, with the same level of trust and security that users expect.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Through continuous innovation and user-centric design, we're working to bridge the gap between complex blockchain technology and everyday users.
                </p>
            </div>
        </div>

        <!-- Our Story -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center">Our Story</h2>
            <div class="bg-gray-50 dark:bg-gray-700 p-8 md:p-12 rounded-2xl shadow-lg">
                <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                    Trading Floor was founded in 2020 with a simple yet powerful vision: to make cryptocurrency trading accessible to everyone. What started as a small team of passionate developers and financial experts has grown into a platform trusted by over 50,000 traders worldwide.
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                    We recognized early on that the cryptocurrency market was becoming increasingly complex, with barriers preventing many people from participating. High fees, complicated interfaces, and security concerns were keeping potential traders away. We set out to change that.
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    Today, Trading Floor stands as a testament to what's possible when you combine cutting-edge technology with a user-first approach. We've processed over $2 billion in trading volume, maintained 99.9% uptime, and continue to innovate with new features that make trading easier, safer, and more profitable for our users.
                </p>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-700 dark:to-gray-800 rounded-2xl p-8 md:p-12 shadow-lg mb-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center">Why Choose Us?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">Security First</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Your security is our top priority. We use industry-leading encryption, multi-factor authentication, and cold storage for funds.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">Lightning Fast</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Execute trades instantly with our optimized platform built for speed. Average execution time under 100ms.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">Trusted Platform</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Built on Laravel framework with proven reliability, continuous updates, and 99.9% uptime guarantee.</p>
                </div>
            </div>
        </div>

        <!-- Team Values -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8 text-center">Our Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg text-center">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-2">Transparency</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Clear pricing, no hidden fees</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg text-center">
                    <div class="text-4xl mb-4">💡</div>
                    <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-2">Innovation</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Constantly improving our platform</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg text-center">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-2">Customer First</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Your success is our priority</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg text-center">
                    <div class="text-4xl mb-4">🔒</div>
                    <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-2">Security</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Protecting your assets</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-12 shadow-xl">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Get Started?</h2>
            <p class="text-xl text-blue-100 mb-8">Join thousands of traders already using our platform</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('cryptos.public') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                    Browse Cryptocurrencies
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <a href="{{ route('features') }}" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    Explore Features
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
