@extends('base')

@section('title', 'Login - Centralinks')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-[#161616] text-white">
    <div class="w-full max-w-md bg-[#1e1e1e] p-8 rounded-2xl shadow-md shadow-black/30 border border-gray-700">

        <h2 class="text-2xl font-bold mb-6 text-center">Sign in to Centralinks</h2>

        @if(session('error'))
            <div class="mb-4 text-sm text-red-400 bg-red-900 bg-opacity-20 border border-red-700 p-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @auth
            <div class="mb-3 text-sm text-gray-400">
                You are logged in as <span class="font-semibold text-white">{{ Auth::user()->email }}</span>,
                <a href="{{ route('logout') }}" class="text-yellow-400 hover:underline"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        @endauth

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 bg-[#2a2a2a] border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                       required autofocus autocomplete="email">
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-300">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full px-4 py-2 bg-[#2a2a2a] border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                       required autocomplete="current-password">
            </div>

            <button type="submit"
                    class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded-lg transition">
                Sign in
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-400">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-yellow-400 hover:underline">Sign up here</a>
        </p>
    </div>
</div>
@endsection
