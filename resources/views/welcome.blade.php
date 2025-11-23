<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
{{-- tailwind css here from assets --}}
<script src="{{ asset('js/browser@4.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.125);
        }
        
        .feature-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        .floating-2 {
            animation: floating 4s ease-in-out infinite;
            animation-delay: 1s;
        }
        
        .floating-3 {
            animation: floating 5s ease-in-out infinite;
            animation-delay: 2s;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px) rotate(0deg); }
            50% { transform: translate(0, -20px) rotate(5deg); }
            100% { transform: translate(0, -0px) rotate(0deg); }
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        @keyframes pulse-glow {
            0% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.7); }
            70% { box-shadow: 0 0 0 20px rgba(99, 102, 241, 0); }
            100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0); }
        }
        
        .bounce-in {
            animation: bounce-in 0.6s ease-out;
        }
        
        @keyframes bounce-in {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .dashboard-preview {
            perspective: 1000px;
        }
        
        .floating-widget {
            transition: all 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .floating-widget:hover {
            transform: translateY(-5px) rotate(2deg);
        }
    </style>
</head>
<body class="bg-slate-950 text-white min-h-screen overflow-x-hidden" x-data="landingPage()">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-10 w-4 h-4 bg-purple-400 rounded-full opacity-20 floating"></div>
        <div class="absolute top-1/3 right-20 w-6 h-6 bg-pink-400 rounded-full opacity-30 floating-2"></div>
        <div class="absolute bottom-1/4 left-1/4 w-3 h-3 bg-blue-400 rounded-full opacity-25 floating-3"></div>
        <div class="absolute top-10 right-1/4 w-5 h-5 bg-green-400 rounded-full opacity-20 floating"></div>
        <div class="absolute bottom-20 left-1/2 w-4 h-4 bg-yellow-400 rounded-full opacity-30 floating-2"></div>
    </div>

    <!-- Navigation -->
    <nav class="glass-effect fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <i class="fas fa-tachometer-alt text-2xl text-purple-400 mr-3"></i>
                    <span class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        {{ config('app.name', 'AdminDashboard') }}
                    </span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="hover:text-purple-300 transition-colors">Features</a>
                    <a href="#dashboard-preview" class="hover:text-purple-300 transition-colors">Dashboard</a>
                    <a href="#tech" class="hover:text-purple-300 transition-colors">Technology</a>
                    
                    @auth
                        <a href="{{ route('home') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition-colors">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-purple-300 transition-colors">
                            Log in
                        </a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-6 py-2 rounded-lg transition-all duration-300 shadow-lg">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden py-4 border-t border-white/20">
                <div class="flex flex-col space-y-4">
                    <a href="#features" class="hover:text-purple-300 transition-colors">Features</a>
                    <a href="#dashboard-preview" class="hover:text-purple-300 transition-colors">Dashboard</a>
                    <a href="#tech" class="hover:text-purple-300 transition-colors">Technology</a>
                    
                    @auth
                        <a href="{{ route('home') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition-colors text-center">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-center hover:text-purple-300 transition-colors py-2">
                            Log in
                        </a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-6 py-2 rounded-lg transition-all duration-300 shadow-lg text-center">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                        Powerful 
                        <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                            Admin Dashboard
                        </span>
                        for Modern Applications
                    </h1>
                    <p class="text-xl text-slate-300 mb-8 leading-relaxed">
                        Streamline your workflow with our intuitive admin dashboard built on Laravel. Monitor analytics, manage users, and track performance with beautiful, responsive design.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-8 py-4 rounded-xl transition-all duration-300 shadow-lg text-lg font-semibold pulse-glow">
                                <i class="fas fa-rocket mr-2"></i>Start Free Trial
                            </a>
                        @endif
                        
                        <a href="{{ route('login') }}" class="glass-effect border border-purple-500/30 hover:border-purple-400 text-white px-8 py-4 rounded-xl transition-all duration-300 text-lg font-semibold">
                            <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                        </a>
                    </div>
                    
                    <div class="mt-8 flex items-center justify-center lg:justify-start space-x-8 text-slate-400">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            <span>Built with Laravel</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            <span>Real-time Analytics</span>
                        </div>
                    </div>
                </div>

                <!-- Animated Dashboard Preview -->
                <div class="relative dashboard-preview">
                    <!-- Main Dashboard Container -->
                    <div class="glass-effect rounded-2xl p-6 floating-widget">
                        <div class="bg-slate-800 rounded-xl p-4 shadow-2xl">
                            <!-- Header Bar -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                </div>
                                <div class="text-xs text-slate-400">Live Dashboard</div>
                            </div>
                            
                            <!-- Widget Grid -->
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="bg-gradient-to-br from-blue-500 to-indigo-700 rounded-lg p-3 floating" style="animation-delay: 0.2s;">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center mr-2">
                                            <i class="fas fa-dollar-sign text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-white text-xs font-semibold">Revenue</div>
                                            <div class="text-white text-xs">$24.5K</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-br from-emerald-500 to-teal-700 rounded-lg p-3 floating" style="animation-delay: 0.4s;">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center mr-2">
                                            <i class="fas fa-users text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-white text-xs font-semibold">Users</div>
                                            <div class="text-white text-xs">1.2K</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg p-3 floating" style="animation-delay: 0.6s;">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center mr-2">
                                            <i class="fas fa-chart-line text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-white text-xs font-semibold">Growth</div>
                                            <div class="text-white text-xs">+12.5%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg p-3 floating" style="animation-delay: 0.8s;">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center mr-2">
                                            <i class="fas fa-shopping-cart text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-white text-xs font-semibold">Orders</div>
                                            <div class="text-white text-xs">284</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Chart Preview -->
                            <div class="bg-slate-700 rounded-lg p-3 mb-3">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="text-white text-xs font-semibold">Analytics</div>
                                    <div class="text-slate-400 text-xs">Last 7 days</div>
                                </div>
                                <div class="flex items-end space-x-1 h-16">
                                    <div class="w-3 bg-purple-500 rounded-t transition-all duration-500" :style="`height: ${chartBar1}%`"></div>
                                    <div class="w-3 bg-blue-500 rounded-t transition-all duration-500" :style="`height: ${chartBar2}%`"></div>
                                    <div class="w-3 bg-green-500 rounded-t transition-all duration-500" :style="`height: ${chartBar3}%`"></div>
                                    <div class="w-3 bg-pink-500 rounded-t transition-all duration-500" :style="`height: ${chartBar4}%`"></div>
                                    <div class="w-3 bg-purple-500 rounded-t transition-all duration-500" :style="`height: ${chartBar5}%`"></div>
                                    <div class="w-3 bg-blue-500 rounded-t transition-all duration-500" :style="`height: ${chartBar6}%`"></div>
                                    <div class="w-3 bg-green-500 rounded-t transition-all duration-500" :style="`height: ${chartBar7}%`"></div>
                                </div>
                            </div>
                            
                            <!-- Notifications Preview -->
                            <div class="bg-slate-700 rounded-lg p-3">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="text-white text-xs font-semibold">Recent Activity</div>
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center text-xs text-slate-300">
                                        <i class="fas fa-user-plus text-green-400 mr-2 text-xs"></i>
                                        <span>New user registered</span>
                                    </div>
                                    <div class="flex items-center text-xs text-slate-300">
                                        <i class="fas fa-shopping-cart text-blue-400 mr-2 text-xs"></i>
                                        <span>New order received</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Widgets Around Main Dashboard -->
                    <div class="absolute -top-4 -right-4 glass-effect rounded-lg p-3 floating-widget floating-2">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div class="text-xs">
                                <div class="font-semibold">Online</div>
                                <div class="text-slate-400">24/7</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 glass-effect rounded-lg p-3 floating-widget floating-3">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-bell text-white text-xs"></i>
                            </div>
                            <div class="text-xs">
                                <div class="font-semibold">Alerts</div>
                                <div class="text-slate-400">3 new</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute top-1/2 -right-8 glass-effect rounded-lg p-2 floating-widget floating">
                        <div class="text-center">
                            <div class="text-xs font-semibold">CPU</div>
                            <div class="text-green-400 text-xs">42%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Features Preview -->
    <section id="dashboard-preview" class="py-20 px-4 sm:px-6 lg:px-8 bg-slate-900/30">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Everything You Need in 
                    <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        One Dashboard
                    </span>
                </h2>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto">
                    Discover the powerful features that make our admin dashboard the perfect choice for your Laravel application.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
                <!-- Analytics Feature -->
                <div class="relative">
                    <div class="glass-effect rounded-2xl p-6 floating-widget">
                        <div class="bg-slate-800 rounded-xl p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-chart-bar text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Advanced Analytics</h3>
                                    <p class="text-slate-400 text-sm">Real-time data visualization</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="bg-slate-700 rounded-lg p-3 text-center">
                                    <div class="text-2xl font-bold text-green-400">+23%</div>
                                    <div class="text-xs text-slate-400">Growth</div>
                                </div>
                                <div class="bg-slate-700 rounded-lg p-3 text-center">
                                    <div class="text-2xl font-bold text-blue-400">1.5K</div>
                                    <div class="text-xs text-slate-400">Visits</div>
                                </div>
                            </div>
                            <div class="bg-slate-700 rounded-lg p-3">
                                <div class="flex justify-between text-xs text-slate-400 mb-2">
                                    <span>Monthly Target</span>
                                    <span>85%</span>
                                </div>
                                <div class="w-full bg-slate-600 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating elements around analytics -->
                    <div class="absolute -top-2 -right-2 w-4 h-4 bg-blue-400 rounded-full floating"></div>
                    <div class="absolute -bottom-2 -left-2 w-3 h-3 bg-purple-400 rounded-full floating-2"></div>
                </div>

                <!-- User Management Feature -->
                <div class="relative">
                    <div class="glass-effect rounded-2xl p-6 floating-widget floating-2">
                        <div class="bg-slate-800 rounded-xl p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-users-cog text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">User Management</h3>
                                    <p class="text-slate-400 text-sm">Complete control system</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between bg-slate-700 rounded-lg p-3">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-user text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm">Administrators</span>
                                    </div>
                                    <span class="text-green-400 text-sm">12</span>
                                </div>
                                <div class="flex items-center justify-between bg-slate-700 rounded-lg p-3">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-user text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm">Editors</span>
                                    </div>
                                    <span class="text-blue-400 text-sm">24</span>
                                </div>
                                <div class="flex items-center justify-between bg-slate-700 rounded-lg p-3">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center mr-2">
                                            <i class="fas fa-user text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm">Viewers</span>
                                    </div>
                                    <span class="text-purple-400 text-sm">156</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Floating Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="glass-effect rounded-xl p-6 text-center floating-widget">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bell text-white text-xl"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Smart Notifications</h4>
                    <p class="text-slate-400 text-sm">Real-time alerts and updates</p>
                </div>
                
                <div class="glass-effect rounded-xl p-6 text-center floating-widget floating-2">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-white text-xl"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Mobile Ready</h4>
                    <p class="text-slate-400 text-sm">Perfect experience on all devices</p>
                </div>
                
                <div class="glass-effect rounded-xl p-6 text-center floating-widget floating-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-white text-xl"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Lightning Fast</h4>
                    <p class="text-slate-400 text-sm">Optimized for performance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack Section -->
    <section id="tech" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Built With Modern 
                    <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        Technology Stack
                    </span>
                </h2>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center mb-12">
                <div class="text-center floating-widget">
                    <i class="fab fa-laravel text-6xl text-red-500 mb-4"></i>
                    <p class="text-slate-400 font-semibold">Laravel 12</p>
                    <p class="text-slate-500 text-sm">Backend Framework</p>
                </div>
                <div class="text-center floating-widget floating-2">
                    <i class="fab fa-js-square text-6xl text-yellow-400 mb-4"></i>
                    <p class="text-slate-400 font-semibold">Alpine.js</p>
                    <p class="text-slate-500 text-sm">Frontend Interactivity</p>
                </div>
                <div class="text-center floating-widget floating-3">
                    <i class="fab fa-css3-alt text-6xl text-blue-500 mb-4"></i>
                    <p class="text-slate-400 font-semibold">Tailwind CSS</p>
                    <p class="text-slate-500 text-sm">Styling Framework</p>
                </div>
                <div class="text-center floating-widget">
                    <i class="fas fa-database text-6xl text-green-500 mb-4"></i>
                    <p class="text-slate-400 font-semibold">MySQL</p>
                    <p class="text-slate-500 text-sm">Database</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Floating elements around CTA -->
            <div class="absolute top-10 left-10 w-8 h-8 bg-purple-400 rounded-full opacity-20 floating"></div>
            <div class="absolute bottom-10 right-10 w-6 h-6 bg-pink-400 rounded-full opacity-30 floating-2"></div>
            
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Ready to Transform Your 
                <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                    Dashboard Experience?
                </span>
            </h2>
            <p class="text-xl text-slate-300 mb-8 max-w-2xl mx-auto">
                Join thousands of developers who have revolutionized their workflow with our powerful admin dashboard template.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-8 py-4 rounded-xl transition-all duration-300 shadow-lg text-lg font-semibold pulse-glow">
                        <i class="fas fa-rocket mr-2"></i>Start Building Today
                    </a>
                @endif
                
                <a href="{{ route('login') }}" class="glass-effect border border-purple-500/30 hover:border-purple-400 text-white px-8 py-4 rounded-xl transition-all duration-300 text-lg font-semibold">
                    <i class="fas fa-eye mr-2"></i>Live Demo
                </a>
            </div>
            
            <div class="mt-8 text-slate-400">
                <p>Free 14-day trial • No credit card required • Setup in minutes</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900/50 border-t border-slate-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-tachometer-alt text-2xl text-purple-400 mr-3"></i>
                        <span class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                            {{ config('app.name', 'AdminDashboard') }}
                        </span>
                    </div>
                    <p class="text-slate-400 mb-4 max-w-md">
                        A beautiful, responsive admin dashboard built with Laravel, Tailwind CSS, and Alpine.js. Perfect for modern web applications.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-slate-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-purple-400 transition-colors">
                            <i class="fab fa-laravel text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="https://laravel.com/docs" class="hover:text-purple-400 transition-colors">Laravel Docs</a></li>
                        <li><a href="https://tailwindcss.com/docs" class="hover:text-purple-400 transition-colors">Tailwind CSS</a></li>
                        <li><a href="https://alpinejs.dev" class="hover:text-purple-400 transition-colors">Alpine.js</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition-colors">API Documentation</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-purple-400 transition-colors">GitHub Issues</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition-colors">Community</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition-colors">Contribute</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-8 pt-8 text-center text-slate-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'AdminDashboard') }}. Built with ❤️ using Laravel.</p>
            </div>
        </div>
    </footer>

    <script>
        function landingPage() {
            return {
                mobileMenuOpen: false,
                chartBar1: 40,
                chartBar2: 60,
                chartBar3: 80,
                chartBar4: 50,
                chartBar5: 70,
                chartBar6: 90,
                chartBar7: 65,
                
                init() {
                    // Smooth scrolling for anchor links
                    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                        anchor.addEventListener('click', function (e) {
                            e.preventDefault();
                            const target = document.querySelector(this.getAttribute('href'));
                            if (target) {
                                target.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }
                        });
                    });
                    
                    // Animate chart bars
                    this.animateChartBars();
                },
                
                animateChartBars() {
                    const bars = [40, 60, 80, 50, 70, 90, 65];
                    let currentBars = [0, 0, 0, 0, 0, 0, 0];
                    const duration = 2000;
                    const startTime = Date.now();
                    
                    const animate = () => {
                        const elapsed = Date.now() - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        currentBars = bars.map(bar => Math.floor(bar * progress));
                        
                        this.chartBar1 = currentBars[0];
                        this.chartBar2 = currentBars[1];
                        this.chartBar3 = currentBars[2];
                        this.chartBar4 = currentBars[3];
                        this.chartBar5 = currentBars[4];
                        this.chartBar6 = currentBars[5];
                        this.chartBar7 = currentBars[6];
                        
                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        }
                    };
                    
                    animate();
                }
            }
        }
    </script>
</body>
</html>