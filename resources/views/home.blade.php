@extends('base')

@section('title', 'HomePage - Centralinks')

@section('body')

<section class="flex flex-col items-center justify-center text-center max-w-3xl mx-auto mt-20">

    <div class="relative rounded-full p-[1px] h-8 inline-flex overflow-hidden text-[14px]/6 text-gray-200 transition">
        <span class="absolute inset-[-1000%] animate-[spin_2s_linear_infinite] bg-[conic-gradient(from_90deg_at_50%_50%,#FFFF00_0%,transparent_50%,#FFFF00_100%)]"></span>
        <a target="_blank" class="inline-flex h-full px-3 py-1 w-full cursor-pointer items-center justify-center rounded-full bg-stone-900 backdrop-blur-3xl" href="https://www.linkedin.com/feed/update/urn:li:activity:7311254984879157248/">
            Fetch your own feed from any source
            <span class="ml-1 font-semibold text-yellow-500">Read more &rarr;</span>
        </a>
    </div>

    <h2 class="text-5xl font-extrabold mt-10 text-yellow-300">Your Information, Your Way.</h2>
    <p class="mt-4 text-lg text-gray-400 max-w-xl">
        Centralinks is your custom feed manager. Get updates only from the sources you choose — Reddit, Twitter, Discord and more.
    </p>

    <div class="mt-8">
        <a href="{{ route('feed') }}" class="px-6 py-3 text-black bg-yellow-400 hover:bg-yellow-500 rounded-xl font-semibold transition">
            Get Started
        </a>
    </div>
</section>

@include('partials.carousel')

<section class="my-24 max-w-4xl mx-auto text-center">
    <h3 class="text-2xl font-bold mb-6 text-yellow-300">How it works</h3>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-[#1a1a1d] p-6 rounded-2xl shadow-md">
            <h4 class="font-semibold text-lg mb-2 text-white">1. Choose your sources</h4>
            <p class="text-gray-400 text-sm">Pick from Reddit, Twitter, Discord, and more.</p>
        </div>
        <div class="bg-[#1a1a1d] p-6 rounded-2xl shadow-md text-white">
            <h4 class="font-semibold text-lg mb-2">2. Organize into feeds</h4>
            <p class="text-gray-400 text-sm">Group sources by category or topic.</p>
        </div>
        <div class="bg-[#1a1a1d] p-6 rounded-2xl shadow-md text-white">
            <h4 class="font-semibold text-lg mb-2">3. Stay updated</h4>
            <p class="text-gray-400 text-sm">View a clean, personalized feed anytime.</p>
        </div>
    </div>
</section>

@endsection
