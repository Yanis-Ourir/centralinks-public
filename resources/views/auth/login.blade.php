@extends('base')

@section('title', 'HomePage - Centralinks')

@section('body')
<x-guest-layout class="min-h-screen flex items-center justify-center bg-[#161616] text-white">
    <form method="POST" action="{{ route('login') }}" class="w-full max-w-md bg-[#1e1e1e] border border-gray-700 rounded-2xl p-8 shadow-lg shadow-black/30">
        @csrf

        <!-- Title -->
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-yellow-500">Connexion</h1>
            <p class="text-gray-400 mt-2 text-sm">Connectez-vous pour accéder à Centralinks</p>
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-300"/>
            <x-text-input id="email" 
                class="block w-full mt-1 bg-[#161616] border border-gray-700 text-white focus:border-yellow-500 focus:ring-yellow-500 rounded-lg p-3" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-yellow-400" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-300"/>
            <x-text-input id="password" 
                class="block w-full mt-1 bg-[#161616] border border-gray-700 text-white focus:border-yellow-500 focus:ring-yellow-500 rounded-lg p-3" 
                type="password" 
                name="password" 
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-yellow-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-6">
            <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-yellow-500 bg-[#161616] shadow-sm focus:ring-yellow-500 focus:border-yellow-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-400">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Actions -->
        <div class="flex flex-col space-y-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-yellow-500 hover:underline text-center" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold py-3 px-4 rounded-lg transition-all">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
@endsection
