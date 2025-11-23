<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/browser@4.js') }}"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        button:hover{
            cursor : pointer;
        }
    </style>
</head>
<body class="bg-slate-950 min-h-screen">
    <div id="app">
        <!-- Navigation -->
        <nav class="bg-slate-800 border-b border-slate-700 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Left Side - Brand -->
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center">
                            <i class="fas fa-tachometer-alt text-2xl text-purple-400 mr-3"></i>
                            <span class="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                                {{ config('app.name', 'AdminDashboard') }}
                            </span>
                        </a>
                    </div>

                    <!-- Right Side - Navigation Links -->
                    <div class="hidden md:flex items-center space-x-8">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-slate-300 hover:text-white transition-colors duration-200 font-medium">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-6 py-2 rounded-lg transition-all duration-300 shadow-lg font-medium">
                                    <i class="fas fa-user-plus mr-2"></i>Get Started
                                </a>
                            @endif
                        @else
                            <div class="relative" x-data="{ open: false }">
                                <button 
                                    @click="open = !open"
                                    class="flex items-center space-x-3 bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                >
                                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div class="text-slate-200 font-medium">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <i class="fas fa-chevron-down text-slate-400 text-xs transition-transform duration-200" :class="{'rotate-180': open}"></i>
                                </button>

                                <!-- Dropdown Menu -->
                                <div 
                                    x-show="open" 
                                    @click.away="open = false" 
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95"
                                    class="absolute right-0 mt-2 w-48 bg-slate-800 rounded-lg shadow-xl border border-slate-700 py-1 z-50"
                                >
                                    <a href="{{ url('/dashboard') }}" class="flex items-center px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors">
                                        <i class="fas fa-tachometer-alt mr-3 text-purple-400"></i>
                                        Dashboard
                                    </a>
                                    <a href="#" class="flex items-center px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors">
                                        <i class="fas fa-user mr-3 text-blue-400"></i>
                                        Profile
                                    </a>
                                    <a href="#" class="flex items-center px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors">
                                        <i class="fas fa-cog mr-3 text-green-400"></i>
                                        Settings
                                    </a>
                                    <div class="border-t border-slate-700 my-1"></div>
                                    <a 
                                        href="{{ route('logout') }}"
                                        class="flex items-center px-4 py-3 text-slate-300 hover:text-white hover:bg-red-600 transition-colors"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >
                                        <i class="fas fa-sign-out-alt mr-3 text-red-400"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button 
                            type="button" 
                            class="text-slate-300 hover:text-white focus:outline-none focus:text-white"
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            x-data="{ mobileMenuOpen: false }"
                        >
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div 
                    x-show="mobileMenuOpen" 
                    x-cloak
                    class="md:hidden border-t border-slate-700 py-4"
                    x-data="{ mobileMenuOpen: false }"
                >
                    <div class="flex flex-col space-y-4">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-slate-300 hover:text-white transition-colors font-medium py-2">
                                    <i class="fas fa-sign-in-alt mr-3"></i>Login
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-lg font-medium text-center">
                                    <i class="fas fa-user-plus mr-2"></i>Get Started
                                </a>
                            @endif
                        @else
                            <div class="space-y-2">
                                <div class="flex items-center space-x-3 px-2 py-3 bg-slate-700 rounded-lg">
                                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div class="text-slate-200 font-medium">
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                                <a href="{{ url('/dashboard') }}" class="flex items-center px-2 py-3 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors rounded-lg">
                                    <i class="fas fa-tachometer-alt mr-3 text-purple-400"></i>
                                    Dashboard
                                </a>
                                <a href="#" class="flex items-center px-2 py-3 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors rounded-lg">
                                    <i class="fas fa-user mr-3 text-blue-400"></i>
                                    Profile
                                </a>
                                <a href="#" class="flex items-center px-2 py-3 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors rounded-lg">
                                    <i class="fas fa-cog mr-3 text-green-400"></i>
                                    Settings
                                </a>
                                <a 
                                    href="{{ route('logout') }}"
                                    class="flex items-center px-2 py-3 text-slate-300 hover:text-white hover:bg-red-600 transition-colors rounded-lg"
                                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                                >
                                    <i class="fas fa-sign-out-alt mr-3 text-red-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="min-h-screen">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-slate-900 border-t border-slate-800 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <i class="fas fa-tachometer-alt text-xl text-purple-400 mr-3"></i>
                        <span class="text-lg font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                            {{ config('app.name', 'AdminDashboard') }}
                        </span>
                    </div>
                    <div class="text-slate-400 text-sm">
                        &copy; {{ date('Y') }} {{ config('app.name', 'AdminDashboard') }}. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>