@extends('base')

@section('title', 'Register - Centralinks')

@section('body')
<div class="flex items-center justify-center min-h-screen bg-[#161616] text-white">
    <div class="w-full max-w-md bg-[#1e1e1e] p-8 rounded-2xl shadow-md shadow-black/30 border border-gray-700">

        <h1 class="text-3xl font-bold mb-2 text-yellow-500 text-center">Inscription</h1>
        <p class="text-center text-gray-400 mb-6">Créez un compte pour accéder à Centralinks</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-white text-md" />
                <x-text-input id="name" class="block mt-1 w-full text-white focus:border-yellow-500 border border-gray-700 bg-[#2a2a2a] p-2"
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-white text-md" />
                <x-text-input id="email" class="block mt-1 w-full text-white focus:border-yellow-500 border border-gray-700 bg-[#2a2a2a] p-2"
                              type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-white text-md" />
                <x-text-input id="password" class="block mt-1 w-full text-white focus:border-yellow-500 border border-gray-700 bg-[#2a2a2a] p-2"
                              type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white text-md" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full text-white focus:border-yellow-500 border border-gray-700 bg-[#2a2a2a] p-2"
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Already Registered -->
            <div class="flex items-center justify-between mb-4">
                <a class="text-sm text-gray-400 hover:text-yellow-500 transition" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <!-- Submit Button -->
            <x-primary-button class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 rounded">
                {{ __('Register') }}
            </x-primary-button>
        </form>
    </div>
</div>
@endsection
