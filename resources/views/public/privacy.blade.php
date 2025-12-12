@extends('layouts.public')

@section('title', 'Privacy Policy - Crypto Trading Platform')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Privacy Policy</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Your privacy is important to us. Learn how we collect, use, and protect your personal information.
        </p>
        <p class="mt-4 text-blue-200">Last Updated: {{ date('F d, Y') }}</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg dark:prose-invert max-w-none">
            <!-- Introduction -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Introduction</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Trading Floor ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our cryptocurrency trading platform.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    By using our platform, you agree to the collection and use of information in accordance with this policy. If you do not agree with our policies and practices, do not use our services.
                </p>
            </div>

            <!-- Information We Collect -->
            <div class="mb-12 bg-gray-50 dark:bg-gray-700 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Information We Collect</h2>
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Personal Information</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    When you register for an account, we may collect:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                    <li>Name and contact information (email address, phone number)</li>
                    <li>Account credentials (username, password)</li>
                    <li>Identity verification documents (when required by law)</li>
                    <li>Payment information (processed securely through third-party providers)</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 mt-6">Usage Information</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We automatically collect information about how you interact with our platform:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li>Transaction history and trading activity</li>
                    <li>Device information (IP address, browser type, operating system)</li>
                    <li>Usage patterns and preferences</li>
                    <li>Cookies and similar tracking technologies</li>
                </ul>
            </div>

            <!-- How We Use Your Information -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">How We Use Your Information</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We use the information we collect for the following purposes:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Service Provision</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">To provide, maintain, and improve our trading platform and services.</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Security</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">To protect against fraud, unauthorized access, and other security threats.</p>
                    </div>
                    <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Communication</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">To send you updates, notifications, and respond to your inquiries.</p>
                    </div>
                    <div class="bg-orange-50 dark:bg-orange-900/20 p-6 rounded-xl">
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Legal Compliance</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">To comply with legal obligations and regulatory requirements.</p>
                    </div>
                </div>
            </div>

            <!-- Data Security -->
            <div class="mb-12 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Data Security</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We implement industry-standard security measures to protect your personal information:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-3">
                    <li><strong>Encryption:</strong> All data transmitted between your device and our servers is encrypted using SSL/TLS technology.</li>
                    <li><strong>Secure Storage:</strong> Personal information is stored on secure servers with restricted access.</li>
                    <li><strong>Authentication:</strong> Multi-factor authentication options to protect your account.</li>
                    <li><strong>Regular Audits:</strong> We conduct regular security audits and assessments.</li>
                    <li><strong>Employee Training:</strong> Our staff are trained on data protection and privacy best practices.</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-6">
                    However, no method of transmission over the Internet or electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your information, we cannot guarantee absolute security.
                </p>
            </div>

            <!-- Cookies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Cookies and Tracking Technologies</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We use cookies and similar tracking technologies to track activity on our platform and hold certain information. Cookies are files with a small amount of data which may include an anonymous unique identifier.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Types of cookies we use:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li><strong>Essential Cookies:</strong> Required for the platform to function properly</li>
                    <li><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our platform</li>
                    <li><strong>Preference Cookies:</strong> Remember your settings and preferences</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-4">
                    You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our platform.
                </p>
            </div>

            <!-- Third-Party Services -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Third-Party Services</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Our platform may contain links to third-party websites or services that are not owned or controlled by Trading Floor. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites or services.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    We strongly advise you to review the privacy policy of every website you visit. We may use third-party service providers to help us operate our platform and administer activities on our behalf, such as payment processing and analytics.
                </p>
            </div>

            <!-- Your Rights -->
            <div class="mb-12 bg-blue-50 dark:bg-blue-900/20 p-8 rounded-2xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Your Privacy Rights</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Depending on your location, you may have certain rights regarding your personal information:
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-3">
                    <li><strong>Access:</strong> Request access to your personal information</li>
                    <li><strong>Correction:</strong> Request correction of inaccurate or incomplete data</li>
                    <li><strong>Deletion:</strong> Request deletion of your personal information</li>
                    <li><strong>Portability:</strong> Request transfer of your data to another service</li>
                    <li><strong>Objection:</strong> Object to processing of your personal information</li>
                    <li><strong>Restriction:</strong> Request restriction of processing your data</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-6">
                    To exercise these rights, please contact us using the information provided in the Contact section below.
                </p>
            </div>

            <!-- Data Retention -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Data Retention</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    We will retain your personal information only for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law. When we no longer need your personal information, we will securely delete or anonymize it.
                </p>
            </div>

            <!-- Children's Privacy -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Children's Privacy</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Our platform is not intended for individuals under the age of 18. We do not knowingly collect personal information from children. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately.
                </p>
            </div>

            <!-- Changes to Privacy Policy -->
            <div class="mb-12 bg-yellow-50 dark:bg-yellow-900/20 p-8 rounded-2xl border-2 border-yellow-200 dark:border-yellow-800">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Changes to This Privacy Policy</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
                </p>
            </div>

            <!-- Contact -->
            <div class="mb-12 bg-gradient-to-r from-blue-600 to-purple-600 p-8 rounded-2xl text-white">
                <h2 class="text-3xl font-bold mb-6">Contact Us</h2>
                <p class="text-blue-100 leading-relaxed mb-4">
                    If you have any questions about this Privacy Policy or our data practices, please contact us:
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

