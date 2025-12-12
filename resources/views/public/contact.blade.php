@extends('layouts.public')

@section('title', 'Contact Us - Crypto Trading Platform')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Get in Touch</h1>
        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
            Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-8 md:p-10 rounded-2xl shadow-xl">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Send us a Message</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8">Fill out the form below and we'll get back to you within 24 hours.</p>
                
                <div id="successMessage" class="hidden mb-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 rounded-lg"></div>
                <div id="errorMessage" class="hidden mb-6 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 rounded-lg"></div>

                <form id="contactForm" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Your Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-gray-100 transition @error('name') border-red-500 @enderror"
                            placeholder="John Doe">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email Address *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-gray-100 transition @error('email') border-red-500 @enderror"
                            placeholder="john@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Subject *</label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-gray-100 transition @error('subject') border-red-500 @enderror">
                            <option value="">Select a subject</option>
                            <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Technical Support</option>
                            <option value="billing" {{ old('subject') == 'billing' ? 'selected' : '' }}>Billing Question</option>
                            <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership Opportunity</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Message *</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-gray-100 transition resize-none @error('message') border-red-500 @enderror"
                            placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" id="submitBtn" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-4 rounded-lg font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="submitText">Send Message</span>
                        <span id="submitLoader" class="hidden">
                            <svg class="inline-block ml-2 w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <svg id="submitIcon" class="inline-block ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Contact Information</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">
                        We're here to help! Reach out to us through any of the following channels. Our support team is available 24/7.
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4 bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mb-2">Email</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-1">
                                <a href="mailto:support@tradingfloors.in" class="hover:text-blue-600 dark:hover:text-blue-400 transition">support@tradingfloors.in</a>
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                <a href="mailto:support@tradingfloors.in" class="hover:text-blue-600 dark:hover:text-blue-400 transition">support@tradingfloors.in</a>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Response within 24 hours</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mb-2">Phone</h3>
                            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-1">
                                <a href="tel:+919716116108" class="hover:text-blue-600 dark:hover:text-blue-400 transition">+91 9716116108</a>
                            </p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Call us anytime for immediate assistance</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">Available 24/7</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mb-2">Support Hours</h3>
                            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-1">24/7 Customer Support</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">We're always here to help you with any questions or issues.</p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">Average response time: &lt; 1 hour</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mb-2">Office Address</h3>
                            <p class="text-gray-700 dark:text-gray-300">RZ- 478/5 basement street no -45</p>
                            <p class="text-gray-700 dark:text-gray-300">Sadh Nagar -2 palam nasir pur road</p>
                            <p class="text-gray-700 dark:text-gray-300">Dwarka, New Delhi - 110045</p>
                            <p class="text-gray-700 dark:text-gray-300">India</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Visit by appointment only</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-700 dark:to-gray-800 rounded-xl p-6 shadow-lg">
                    <h3 class="font-bold text-lg text-gray-900 dark:text-gray-100 mb-4">Need Immediate Help?</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Check out our resources for quick answers to common questions.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="flex items-center space-x-2 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span>Documentation</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>FAQ</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span>Guides</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Help Center</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitLoader = document.getElementById('submitLoader');
        const submitIcon = document.getElementById('submitIcon');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Hide previous messages
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');

            // Disable submit button and show loading
            submitBtn.disabled = true;
            submitText.textContent = 'Sending...';
            submitLoader.classList.remove('hidden');
            submitIcon.classList.add('hidden');

            // Get form data
            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Submit via Axios
            axios.post('{{ route("contact.store") }}', formData, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    // Show success message
                    successMessage.textContent = response.data.message;
                    successMessage.classList.remove('hidden');
                    
                    // Reset form
                    form.reset();
                    
                    // Scroll to top to show message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    // Show error message
                    errorMessage.textContent = response.data.message || 'An error occurred. Please try again.';
                    errorMessage.classList.remove('hidden');
                }
            })
            .catch(function(error) {
                let errorMsg = 'An error occurred. Please try again.';
                
                if (error.response) {
                    // Server responded with error
                    if (error.response.data.message) {
                        errorMsg = error.response.data.message;
                    } else if (error.response.data.errors) {
                        // Validation errors
                        const errors = error.response.data.errors;
                        const errorList = Object.values(errors).flat().join('<br>');
                        errorMessage.innerHTML = errorList;
                        errorMessage.classList.remove('hidden');
                        submitBtn.disabled = false;
                        submitText.textContent = 'Send Message';
                        submitLoader.classList.add('hidden');
                        submitIcon.classList.remove('hidden');
                        return;
                    }
                }
                
                errorMessage.textContent = errorMsg;
                errorMessage.classList.remove('hidden');
            })
            .finally(function() {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitText.textContent = 'Send Message';
                submitLoader.classList.add('hidden');
                submitIcon.classList.remove('hidden');
            });
        });
    });
</script>
@endpush
@endsection
