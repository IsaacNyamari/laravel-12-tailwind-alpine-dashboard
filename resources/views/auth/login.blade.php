@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-950 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Animated Background Elements -->
            <div class="fixed inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-1/4 left-10 w-4 h-4 bg-purple-400 rounded-full opacity-20 floating"></div>
                <div class="absolute top-1/3 right-20 w-6 h-6 bg-pink-400 rounded-full opacity-30 floating-2"></div>
                <div class="absolute bottom-1/4 left-1/4 w-3 h-3 bg-blue-400 rounded-full opacity-25 floating-3"></div>
            </div>

            <!-- Header -->
            <div class="text-center">
                <div class="flex items-center justify-center mb-8">
                    <i class="fas fa-tachometer-alt text-3xl text-purple-400 mr-3"></i>
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        {{ config('app.name', 'AdminDashboard') }}
                    </span>
                </div>
                <h2 class="text-3xl font-bold text-white">
                    Welcome Back
                </h2>
                <p class="mt-2 text-slate-400">
                    Sign in to your account to continue
                </p>
            </div>

            <!-- Login Card -->
            <div class="glass-effect rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-6 text-white text-center">
                    <h3 class="text-xl font-bold">Sign In</h3>
                    <p class="text-purple-200 text-sm mt-1">Access your dashboard</p>
                </div>

                <div class="bg-slate-800 p-8">
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-300 mb-2">
                                <i class="fas fa-envelope mr-2 text-purple-400"></i>
                                Email Address
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus
                                class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror"
                                placeholder="Enter your email">
                            @error('email')
                                <span class="text-red-400 text-sm mt-1 flex items-center" role="alert">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-300 mb-2">
                                <i class="fas fa-lock mr-2 text-purple-400"></i>
                                Password
                            </label>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 @error('password') border-red-500 @enderror"
                                placeholder="Enter your password">
                            @error('password')
                                <span class="text-red-400 text-sm mt-1 flex items-center" role="alert">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                    class="w-4 h-4 text-purple-600 bg-slate-700 border-slate-600 rounded focus:ring-purple-500 focus:ring-2">
                                <label for="remember" class="ml-2 text-sm text-slate-300">
                                    Remember me
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-purple-400 hover:text-purple-300 transition-colors">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white py-3 px-4 rounded-lg transition-all duration-300 shadow-lg font-semibold focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-slate-800">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </button>

                        <!-- Register Link -->
                        @if (Route::has('register'))
                            <div class="text-center mt-6">
                                <p class="text-slate-400">
                                    Don't have an account?
                                    <a href="{{ route('register') }}"
                                        class="text-purple-400 hover:text-purple-300 font-semibold transition-colors ml-1">
                                        Create one here
                                    </a>
                                </p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Demo Credentials (Optional - Remove in production) -->
            <div class="text-center">
                <div class="glass-effect rounded-lg p-4 mt-6">
                    <h4 class="text-sm font-semibold text-slate-300 mb-2">Demo Credentials</h4>
                    <div class="text-xs text-slate-400 space-y-1">
                        <p>Email: demo@example.com</p>
                        <p>Password: password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
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
            0% {
                transform: translate(0, 0px) rotate(0deg);
            }

            50% {
                transform: translate(0, -20px) rotate(5deg);
            }

            100% {
                transform: translate(0, -0px) rotate(0deg);
            }
        }

        .glass-effect {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.125);
        }
    </style>
@endsection
