@extends('layouts.public')

@section('title', 'Disclaimer - Crypto Trading Platform')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Disclaimer</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Important information about cryptocurrency trading risks and platform limitations.
        </p>
        <p class="mt-4 text-blue-200">Last Updated: {{ date('F d, Y') }}</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg dark:prose-invert max-w-none">
            <!-- General Disclaimer -->
            <div class="mb-12 bg-red-50 dark:bg-red-900/20 p-8 rounded-2xl border-2 border-red-200 dark:border-red-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">General Disclaimer</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    <strong class="text-red-600 dark:text-red-400">WARNING:</strong> The information provided on Trading Floor is for general informational purposes only and should not be considered as financial, investment, legal, or tax advice.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Cryptocurrency trading involves substantial risk of loss and is not suitable for all investors. The high degree of leverage can work against you as well as for you. Before deciding to trade Crypto Market, you should carefully consider your investment objectives, level of experience, and risk appetite.
                </p>
            </div>

            <!-- No Investment Advice -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">No Investment Advice</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Trading Floor does not provide investment, financial, legal, or tax advice. Any information, analysis, or content provided on the Platform is for informational purposes only and should not be construed as:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                    <li>Investment advice or recommendations</li>
                    <li>An offer to buy or sell any cryptocurrency</li>
                    <li>A solicitation of an offer to buy or sell any cryptocurrency</li>
                    <li>Financial, legal, or tax advice</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    You should consult with a qualified financial advisor, legal counsel, or tax professional before making any investment decisions. Past performance is not indicative of future results.
                </p>
            </div>

            <!-- Trading Risks -->
            <div class="mb-12 bg-yellow-50 dark:bg-yellow-900/20 p-8 rounded-2xl border-2 border-yellow-200 dark:border-yellow-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Trading Risks</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                    Cryptocurrency trading carries significant risks. You should be aware of the following:
                </p>
                
                <div class="space-y-6">
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Market Volatility</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            Cryptocurrency markets are highly volatile. Prices can fluctuate dramatically in short periods, leading to substantial gains or losses. You may lose your entire investment.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Liquidity Risk</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            Some Crypto Market may have limited liquidity, making it difficult to buy or sell large amounts without significantly affecting the price. This can result in execution delays or unfavorable prices.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Regulatory Risk</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            Cryptocurrency regulations vary by jurisdiction and are subject to change. Regulatory actions or changes in laws may adversely affect the value of Crypto Market or restrict trading activities.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Technical Risk</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            Technical failures, cyber attacks, network congestion, or other technological issues may disrupt trading operations, delay transactions, or result in loss of funds. Blockchain networks may experience forks, bugs, or other technical problems.
                        </p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Operational Risk</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            While we implement security measures, no system is completely secure. There is a risk of unauthorized access, hacking, fraud, or other security breaches that could result in loss of your funds.
                        </p>
                    </div>
                </div>
            </div>

            <!-- No Guarantees -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">No Guarantees or Warranties</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Trading Floor makes no representations or warranties regarding:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                    <li>The accuracy, completeness, or reliability of any information on the Platform</li>
                    <li>The performance or profitability of any cryptocurrency</li>
                    <li>The uninterrupted or error-free operation of the Platform</li>
                    <li>The security of your funds or data</li>
                    <li>The availability of the Platform at all times</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    The Platform is provided "as is" and "as available" without warranties of any kind, either express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, or non-infringement.
                </p>
            </div>

            <!-- Third-Party Content -->
            <div class="mb-12 bg-gray-50 dark:bg-gray-700 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Third-Party Content</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Our Platform may contain links to third-party websites, services, or content. We do not endorse, control, or assume responsibility for any third-party content, products, or services.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Your interactions with third parties are solely between you and the third party. We are not responsible for any loss or damage resulting from your use of third-party services or content.
                </p>
            </div>

            <!-- Price Information -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Price Information</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Price information displayed on the Platform is provided for informational purposes only and may not reflect the actual market price at the time of your transaction. Prices are subject to change without notice.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    We do not guarantee the accuracy, completeness, or timeliness of price information. Actual execution prices may differ from displayed prices due to market conditions, network fees, or other factors.
                </p>
            </div>

            <!-- Tax Implications -->
            <div class="mb-12 bg-blue-50 dark:bg-blue-900/20 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Tax Implications</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Cryptocurrency trading may have tax implications in your jurisdiction. You are solely responsible for:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li>Determining your tax obligations</li>
                    <li>Reporting your trading activities to tax authorities</li>
                    <li>Paying any applicable taxes</li>
                    <li>Maintaining accurate records of your transactions</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-6">
                    We recommend consulting with a qualified tax professional to understand your tax obligations. Trading Floor does not provide tax advice and is not responsible for your tax compliance.
                </p>
            </div>

            <!-- Limitation of Liability -->
            <div class="mb-12 bg-red-50 dark:bg-red-900/20 p-8 rounded-2xl border-2 border-red-200 dark:border-red-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Limitation of Liability</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, Trading Floor SHALL NOT BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, INCLUDING BUT NOT LIMITED TO:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                    <li>Loss of profits, revenue, or data</li>
                    <li>Loss of cryptocurrency or funds</li>
                    <li>Trading losses</li>
                    <li>Business interruption</li>
                    <li>Personal injury or property damage</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    This limitation applies regardless of the theory of liability, whether in contract, tort, negligence, strict liability, or otherwise, even if we have been advised of the possibility of such damages.
                </p>
            </div>

            <!-- Acknowledgment -->
            <div class="mb-12 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Your Acknowledgment</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    By using Trading Floor, you acknowledge that:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-3">
                    <li>You understand the risks associated with cryptocurrency trading</li>
                    <li>You are solely responsible for your trading decisions</li>
                    <li>You have the financial resources to bear any losses</li>
                    <li>You will not hold Trading Floor liable for any trading losses</li>
                    <li>You have read and understood this Disclaimer</li>
                    <li>You agree to trade at your own risk</li>
                </ul>
            </div>

            <!-- Updates -->
            <div class="mb-12 bg-yellow-50 dark:bg-yellow-900/20 p-8 rounded-2xl border-2 border-yellow-200 dark:border-yellow-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Disclaimer Updates</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    We reserve the right to update this Disclaimer at any time. Material changes will be communicated through the Platform. Your continued use of the Platform after such changes constitutes acceptance of the updated Disclaimer.
                </p>
            </div>

            <!-- Contact -->
            <div class="mb-12 bg-gradient-to-r from-blue-600 to-purple-600 p-8 rounded-2xl text-white">
                <h2 class="text-3xl font-bold mb-6">Contact Us</h2>
                <p class="text-blue-100 leading-relaxed mb-4">
                    If you have any questions about this Disclaimer, please contact us:
                </p>
                <div class="space-y-2 text-blue-100">
                    <p><strong>Email:</strong> support@Trading Floor.com</p>
                    <p><strong>Address:</strong> 123 Crypto Street, Digital City, DC 12345, United States</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

