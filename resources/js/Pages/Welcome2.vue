<template>
    <div class="bg-gray-50 text-gray-800">
        <!-- Navbar dengan efek blur dan shadow yang lebih halus -->
        <header class="fixed w-full bg-white/80 backdrop-blur-md border-b border-gray-200/50 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-2 group cursor-pointer">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-600 to-indigo-500 rounded-lg shadow-md group-hover:shadow-lg transition-all"></div>
                    <span class="font-bold text-lg bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">MyFinance</span>
                </div>

                <nav class="hidden md:flex space-x-8 text-sm font-medium">
                    <a href="#features" class="text-gray-600 hover:text-indigo-600 transition-colors relative group">
                        Features
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-indigo-600 transition-colors relative group">
                        How it Works
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#demo" class="text-gray-600 hover:text-indigo-600 transition-colors relative group">
                        Demo
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </nav>

                <div v-if="canLogin" class="flex items-center space-x-3">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('login')" 
                            class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition-colors">
                            Login
                        </Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:shadow-lg hover:shadow-indigo-200 transition-all">
                            Sign Up
                        </Link>
                    </template>
                </div>
            </div>
        </header>

        <!-- Hero Section dengan animasi -->
        <section class="pt-32 pb-24 relative overflow-hidden">
            <!-- Background decorative elements -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-20 left-10 w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                <div class="absolute top-40 right-10 w-72 h-72 bg-emerald-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="inline-flex items-center px-4 py-2 bg-indigo-50 rounded-full">
                            <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                            <span class="ml-2 text-sm font-medium text-indigo-600">#1 Personal Finance Tracker</span>
                        </div>

                        <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                            Track Your Money 
                            <span class="relative">
                                <span class="relative z-10 text-indigo-600">Cash & ATM</span>
                                <svg class="absolute -bottom-2 left-0 w-full" viewBox="0 0 300 12" fill="none">
                                    <path d="M0 0L300 12" stroke="url(#gradient)" strokeWidth="4"/>
                                    <defs>
                                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                            <stop offset="0%" stopColor="#6366F1" stopOpacity="0.3"/>
                                            <stop offset="100%" stopColor="#6366F1" stopOpacity="0.3"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <br>in One Place
                        </h1>

                        <p class="text-lg text-gray-600 leading-relaxed max-w-lg">
                            A simple personal finance tracker that understands real life spending — 
                            from cash in your wallet to ATM withdrawals.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <Link :href="route('login')"
                                class="group bg-gradient-to-r from-indigo-600 to-indigo-500 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-xl hover:shadow-indigo-200 transition-all inline-flex items-center">
                                Start Tracking
                                <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </Link>
                            
                            <a href="#how-it-works" 
                                class="group bg-white text-gray-700 px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all inline-flex items-center border border-gray-200">
                                See How It Works
                                <svg class="ml-2 w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="flex items-center gap-8 pt-8">
                            <div>
                                <div class="text-2xl font-bold text-gray-800">10K+</div>
                                <div class="text-sm text-gray-500">Active Users</div>
                            </div>
                            <div class="w-px h-10 bg-gray-200"></div>
                            <div>
                                <div class="text-2xl font-bold text-gray-800">50K+</div>
                                <div class="text-sm text-gray-500">Transactions</div>
                            </div>
                            <div class="w-px h-10 bg-gray-200"></div>
                            <div>
                                <div class="text-2xl font-bold text-gray-800">4.8</div>
                                <div class="text-sm text-gray-500">User Rating</div>
                            </div>
                        </div>
                    </div>

                    <!-- Mockup dengan efek glassmorphism -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/10 to-emerald-600/10 rounded-3xl transform rotate-3"></div>
                        <div class="relative bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/20">
                            <div class="space-y-4">
                                <!-- Mockup Header -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500">Dashboard Preview</span>
                                </div>
                                
                                <!-- Mockup Content -->
                                <div class="h-64 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center">
                                                <span class="text-indigo-600">💰</span>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Total Balance</div>
                                                <div class="text-xl font-bold text-gray-800">$12,450</div>
                                            </div>
                                        </div>
                                        <div class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-xs font-medium">
                                            +12.5%
                                        </div>
                                    </div>
                                    
                                    <!-- Chart Bars -->
                                    <div class="flex items-end justify-between h-24 gap-2">
                                        <div class="w-full bg-indigo-200 rounded-t-lg h-16"></div>
                                        <div class="w-full bg-indigo-300 rounded-t-lg h-20"></div>
                                        <div class="w-full bg-indigo-400 rounded-t-lg h-24"></div>
                                        <div class="w-full bg-indigo-300 rounded-t-lg h-20"></div>
                                        <div class="w-full bg-indigo-200 rounded-t-lg h-12"></div>
                                        <div class="w-full bg-indigo-300 rounded-t-lg h-16"></div>
                                        <div class="w-full bg-indigo-400 rounded-t-lg h-20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features dengan card modern -->
        <section id="features" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-2xl mx-auto">
                    <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Features</span>
                    <h2 class="text-4xl font-bold mt-2">
                        Designed for Real Life
                    </h2>
                    <p class="mt-4 text-gray-500 text-lg">
                        Track your money easily with features built for daily spending.
                    </p>
                </div>

                <div class="mt-16 grid md:grid-cols-3 gap-8">
                    <div v-for="(feature, index) in features" :key="index"
                        class="group p-8 bg-white rounded-2xl border border-gray-100 hover:shadow-xl hover:border-transparent transition-all">
                        <div :class="`w-14 h-14 ${feature.bgColor} rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform`">
                            <span class="text-2xl">{{ feature.icon }}</span>
                        </div>
                        <h3 class="mt-6 font-semibold text-xl text-gray-800">{{ feature.title }}</h3>
                        <p class="text-gray-500 mt-2 leading-relaxed">
                            {{ feature.description }}
                        </p>
                        
                        <!-- Feature list -->
                        <ul class="mt-6 space-y-3">
                            <li v-for="(item, idx) in feature.items" :key="idx" 
                                class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- How it works dengan timeline modern -->
        <section id="how-it-works" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-2xl mx-auto">
                    <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Process</span>
                    <h2 class="text-4xl font-bold mt-2">
                        How It Works
                    </h2>
                    <p class="mt-4 text-gray-500 text-lg">
                        Get started in minutes with these simple steps
                    </p>
                </div>

                <div class="mt-16 relative">
                    <!-- Connecting line -->
                    <div class="absolute top-24 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-200 via-emerald-200 to-indigo-200 hidden md:block"></div>
                    
                    <div class="grid md:grid-cols-3 gap-8 relative">
                        <div v-for="(step, index) in steps" :key="index"
                            class="text-center relative">
                            <div class="relative inline-block">
                                <div :class="`w-20 h-20 ${step.bgColor} rounded-2xl flex items-center justify-center mx-auto shadow-lg relative z-10`">
                                    <span class="text-3xl">{{ step.icon }}</span>
                                </div>
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-sm font-bold text-indigo-600">
                                    {{ index + 1 }}
                                </div>
                            </div>
                            
                            <h3 class="mt-6 text-xl font-semibold text-gray-800">{{ step.title }}</h3>
                            <p class="text-gray-500 mt-3">{{ step.description }}</p>
                            
                            <!-- Time estimate -->
                            <div class="mt-4 inline-flex items-center px-3 py-1 bg-indigo-50 rounded-full text-xs font-medium text-indigo-600">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ step.time }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials (opsional, menambah kredibilitas) -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center max-w-2xl mx-auto">
                    <span class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Testimonials</span>
                    <h2 class="text-4xl font-bold mt-2">
                        Loved by Users
                    </h2>
                    <p class="mt-4 text-gray-500 text-lg">
                        See what our users say about managing their finances with us
                    </p>
                </div>

                <div class="mt-16 grid md:grid-cols-3 gap-8">
                    <div v-for="(testimonial, index) in testimonials" :key="index"
                        class="p-8 bg-gray-50 rounded-2xl hover:shadow-lg transition-all">
                        <div class="flex items-center space-x-1 text-yellow-400 mb-4">
                            <svg v-for="star in 5" :key="star" class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <p class="text-gray-600 italic">"{{ testimonial.text }}"</p>
                        <div class="mt-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                                {{ testimonial.initials }}
                            </div>
                            <div class="ml-3">
                                <div class="font-semibold text-gray-800">{{ testimonial.name }}</div>
                                <div class="text-sm text-gray-500">{{ testimonial.role }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA dengan efek parallax -->
        <section class="py-24 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-indigo-700">
                <!-- <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div> -->
            </div>
            
            <div class="max-w-4xl mx-auto px-6 text-center text-white relative">
                <h2 class="text-4xl md:text-5xl font-bold">
                    Start Managing Your Money Today
                </h2>
                <p class="mt-6 text-xl text-indigo-100">
                    Simple personal finance tracking for everyday life. Join thousands of satisfied users.
                </p>
                
                <div class="mt-10 flex flex-wrap gap-4 justify-center">
                    <Link :href="route('register')" 
                        class="group bg-white text-indigo-600 px-8 py-4 rounded-xl font-semibold hover:shadow-2xl hover:scale-105 transition-all inline-flex items-center">
                        Create Free Account
                        <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </Link>
                    
                    <a href="#features" 
                        class="group bg-indigo-500/20 backdrop-blur-sm text-white px-8 py-4 rounded-xl font-semibold hover:bg-indigo-500/30 transition-all inline-flex items-center border border-indigo-400/50">
                        Learn More
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                </div>

                <!-- Trust badges -->
                <div class="mt-12 flex items-center justify-center gap-8 text-indigo-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Free forever</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                        <span>Secure & private</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                        </svg>
                        <span>24/7 support</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer dengan informasi lebih lengkap -->
        <footer class="bg-gray-900 text-gray-400 py-16">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg"></div>
                            <span class="font-bold text-lg text-white">MyFinance</span>
                        </div>
                        <p class="mt-4 text-sm leading-relaxed max-w-md">
                            Personal finance tracker built with Laravel & Vue. Helping you make better financial decisions with simple and intuitive tools.
                        </p>
                        
                        <!-- Social links -->
                        <div class="mt-6 flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.104c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0021.182-3.762c.969-1.753 1.662-3.703 2.018-5.713.05-.281.075-.567.075-.856 0-1.275-.45-2.45-1.216-3.363a8.984 8.984 0 001.5-1.538z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.205 11.387.6.113.82-.26.82-.58 0-.287-.01-1.05-.015-2.06-3.338.726-4.042-1.61-4.042-1.61-.546-1.39-1.335-1.76-1.335-1.76-1.09-.746.082-.73.082-.73 1.205.085 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.776.418-1.306.762-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.235-3.22-.123-.3-.535-1.52.117-3.16 0 0 1.008-.322 3.3 1.23.96-.267 1.98-.4 3-.405 1.02.005 2.04.138 3 .405 2.29-1.552 3.297-1.23 3.297-1.23.653 1.64.24 2.86.118 3.16.768.84 1.233 1.91 1.233 3.22 0 4.61-2.804 5.62-5.476 5.92.43.37.824 1.102.824 2.22 0 1.602-.015 2.894-.015 3.287 0 .322.216.698.83.578C20.565 21.795 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Footer links -->
                    <div>
                        <h3 class="text-white font-semibold mb-4">Product</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Features</a></li>
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Pricing</a></li>
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Demo</a></li>
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Changelog</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-white font-semibold mb-4">Company</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">About</a></li>
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Blog</a></li>
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Careers</a></li>
                            <li><a href="#" class="hover:text-indigo-400 transition-colors">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center text-sm">
                    <p>© {{ new Date().getFullYear() }} MyFinance. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-indigo-400 transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-indigo-400 transition-colors">Terms of Service</a>
                        <a href="#" class="hover:text-indigo-400 transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// Data untuk features
const features = [
    {
        icon: '💵',
        bgColor: 'bg-indigo-100 text-indigo-600',
        title: 'Cash Tracking',
        description: 'Record physical cash transactions easily and accurately.',
        items: ['Record cash income', 'Track cash expenses', 'Cash balance overview']
    },
    {
        icon: '🏧',
        bgColor: 'bg-emerald-100 text-emerald-600',
        title: 'ATM Flow',
        description: 'Track ATM withdrawals and transfers to cash seamlessly.',
        items: ['Withdrawal history', 'Transfer tracking', 'ATM balance sync']
    },
    {
        icon: '📊',
        bgColor: 'bg-indigo-100 text-indigo-600',
        title: 'Simple Analytics',
        description: 'Understand where your money goes with visual reports.',
        items: ['Spending categories', 'Monthly reports', 'Trend analysis']
    }
];

// Data untuk steps
const steps = [
    {
        icon: '📝',
        bgColor: 'bg-indigo-100',
        title: 'Add Account',
        description: 'Create cash or ATM account in seconds.',
        time: '30 seconds'
    },
    {
        icon: '💰',
        bgColor: 'bg-emerald-100',
        title: 'Record Transaction',
        description: 'Track income or expenses with just a few taps.',
        time: '1 minute'
    },
    {
        icon: '📈',
        bgColor: 'bg-indigo-100',
        title: 'View Balance',
        description: 'See your financial overview instantly.',
        time: 'Real-time'
    }
];

// Data untuk testimonials
const testimonials = [
    {
        text: 'This app changed how I track my money. Simple, intuitive, and exactly what I needed for my daily finances.',
        initials: 'JD',
        name: 'John Doe',
        role: 'Freelancer'
    },
    {
        text: 'Finally an app that understands cash and ATM tracking. The interface is beautiful and easy to use.',
        initials: 'JS',
        name: 'Jane Smith',
        role: 'Small Business Owner'
    },
    {
        text: 'Ive tried many finance apps, but this one is different. Its built for real people with real spending habits.',
        initials: 'MJ',
        name: 'Mike Johnson',
        role: 'Student'
    }
];
</script>

<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}

.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>