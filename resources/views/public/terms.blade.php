@extends('layouts.public')

@section('title', 'Terms of Service - Crypto Trading Platform')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Terms of Service</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Please read these terms carefully before using our cryptocurrency trading platform.
        </p>
        <p class="mt-4 text-blue-200">Last Updated: {{ date('F d, Y') }}</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg dark:prose-invert max-w-none">
            <!-- Agreement -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Agreement to Terms</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    By accessing or using Trading Floor ("the Platform," "we," "us," or "our"), you agree to be bound by these Terms of Service ("Terms"). If you disagree with any part of these terms, then you may not access the Platform.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    These Terms apply to all visitors, users, and others who access or use the Platform. Your access to and use of the Platform is conditioned on your acceptance of and compliance with these Terms.
                </p>
            </div>

            <!-- Account Terms -->
            <div class="mb-12 bg-gray-50 dark:bg-gray-700 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Account Terms</h2>
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Eligibility</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    To use our Platform, you must:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                    <li>Be at least 18 years of age</li>
                    <li>Have the legal capacity to enter into binding agreements</li>
                    <li>Not be prohibited from using the Platform under applicable laws</li>
                    <li>Provide accurate and complete information when creating an account</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Account Security</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    You are responsible for:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li>Maintaining the confidentiality of your account credentials</li>
                    <li>All activities that occur under your account</li>
                    <li>Notifying us immediately of any unauthorized use</li>
                    <li>Ensuring your account information is kept up to date</li>
                </ul>
            </div>

            <!-- Use of Platform -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Use of Platform</h2>
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Permitted Use</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    You may use our Platform for lawful purposes only. You agree to:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">✓ Legitimate Trading</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Use the Platform for legitimate cryptocurrency trading activities.</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">✓ Compliance</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Comply with all applicable laws and regulations.</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">✓ Accurate Information</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Provide accurate and truthful information.</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">✓ Security</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Maintain the security of your account.</p>
                    </div>
                </div>

                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-8">Prohibited Activities</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    You agree NOT to:
                </p>
                <div class="bg-red-50 dark:bg-red-900/20 p-6 rounded-xl mt-4">
                    <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                        <li>Use the Platform for any illegal or unauthorized purpose</li>
                        <li>Violate any laws in your jurisdiction</li>
                        <li>Infringe upon or violate our intellectual property rights</li>
                        <li>Transmit any viruses, malware, or malicious code</li>
                        <li>Attempt to gain unauthorized access to the Platform</li>
                        <li>Interfere with or disrupt the Platform's operation</li>
                        <li>Use automated systems to access the Platform without permission</li>
                        <li>Engage in market manipulation or fraudulent activities</li>
                        <li>Impersonate any person or entity</li>
                    </ul>
                </div>
            </div>

            <!-- Trading Terms -->
            <div class="mb-12 bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Trading Terms</h2>
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Trading Execution</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    When you place a trade order on our Platform:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                    <li>Orders are executed based on current market prices</li>
                    <li>We strive for fast execution but cannot guarantee instant processing</li>
                    <li>All trades are final once executed</li>
                    <li>Market conditions may affect execution prices</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Fees</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Our fee structure is transparent and disclosed before you complete any transaction. Fees may include:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li>Trading fees (buy/sell transactions)</li>
                    <li>Network fees (blockchain transaction costs)</li>
                    <li>Withdrawal fees (if applicable)</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-6">
                    All fees are clearly displayed before you confirm any transaction. We reserve the right to modify our fee structure with prior notice.
                </p>
            </div>

            <!-- Risk Disclosure -->
            <div class="mb-12 bg-yellow-50 dark:bg-yellow-900/20 p-8 rounded-2xl border-2 border-yellow-200 dark:border-yellow-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Risk Disclosure</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    <strong class="text-red-600 dark:text-red-400">IMPORTANT:</strong> Cryptocurrency trading involves substantial risk of loss and is not suitable for every investor. You should carefully consider whether trading Crypto Market is suitable for you in light of your circumstances, knowledge, and financial resources.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Risks include but are not limited to:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li><strong>Market Volatility:</strong> Cryptocurrency prices can be extremely volatile</li>
                    <li><strong>Liquidity Risk:</strong> Some Crypto Market may have limited liquidity</li>
                    <li><strong>Regulatory Risk:</strong> Changes in regulations may affect trading</li>
                    <li><strong>Technical Risk:</strong> Technology failures or cyber attacks</li>
                    <li><strong>Loss of Funds:</strong> You may lose some or all of your invested capital</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-6 font-semibold">
                    Never invest more than you can afford to lose. Past performance does not guarantee future results.
                </p>
            </div>

            <!-- Intellectual Property -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Intellectual Property</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    The Platform and its original content, features, and functionality are owned by Trading Floor and are protected by international copyright, trademark, patent, trade secret, and other intellectual property laws.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    You may not reproduce, distribute, modify, create derivative works of, publicly display, publicly perform, republish, download, store, or transmit any of the material on our Platform without our prior written consent.
                </p>
            </div>

            <!-- Limitation of Liability -->
            <div class="mb-12 bg-gray-50 dark:bg-gray-700 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Limitation of Liability</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    TO THE MAXIMUM EXTENT PERMITTED BY LAW, Trading Floor SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, OR ANY LOSS OF PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR OTHER INTANGIBLE LOSSES.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Our total liability for any claims arising from or related to the Platform shall not exceed the amount you paid us in the twelve (12) months preceding the claim.
                </p>
            </div>

            <!-- Indemnification -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Indemnification</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    You agree to defend, indemnify, and hold harmless Trading Floor and its officers, directors, employees, and agents from and against any claims, liabilities, damages, losses, and expenses, including without limitation reasonable legal and accounting fees, arising out of or in any way connected with your access to or use of the Platform or your violation of these Terms.
                </p>
            </div>

            <!-- Termination -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Termination</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We may terminate or suspend your account and access to the Platform immediately, without prior notice or liability, for any reason, including if you breach these Terms.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Upon termination, your right to use the Platform will cease immediately. All provisions of these Terms which by their nature should survive termination shall survive termination, including ownership provisions, warranty disclaimers, indemnity, and limitations of liability.
                </p>
            </div>

            <!-- Governing Law -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Governing Law</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    These Terms shall be governed by and construed in accordance with the laws of India, without regard to its conflict of law provisions. Any disputes arising from these Terms or your use of the Platform shall be subject to the exclusive jurisdiction of the courts located in New Delhi, India.
                </p>
            </div>

            <!-- Changes to Terms -->
            <div class="mb-12 bg-yellow-50 dark:bg-yellow-900/20 p-8 rounded-2xl border-2 border-yellow-200 dark:border-yellow-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Changes to Terms</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will provide at least 30 days notice prior to any new terms taking effect.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    What constitutes a material change will be determined at our sole discretion. By continuing to access or use our Platform after those revisions become effective, you agree to be bound by the revised terms.
                </p>
            </div>

            <!-- Contact -->
            <div class="mb-12 bg-gradient-to-r from-blue-600 to-purple-600 p-8 rounded-2xl text-white">
                <h2 class="text-3xl font-bold mb-6">Contact Us</h2>
                <p class="text-blue-100 leading-relaxed mb-4">
                    If you have any questions about these Terms of Service, please contact us:
                </p>
                <div class="space-y-2 text-blue-100">
                    <p><strong>Phone:</strong> <a href="tel:+919716116108" class="hover:text-white underline">+91 9716116108</a></p>
                    <p><strong>Email:</strong> <a href="mailto:support@tradingfloors.in" class="hover:text-white underline">support@tradingfloors.in</a></p>
                    <p><strong>Address:</strong> RZ- 478/5 basement street no -45 Sadh Nagar -2 palam nasir pur road dwarka new delhi 110045</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

