@extends('base')

@section('title', 'Your Feed - Centralinks')

@section('body')
<div class="flex min-h-screen bg-[#161616] text-white">

    @include('partials.sidenav')

    
    <main class="flex-1 p-10 md:ml-64 mt-14 md:mt-0">
        <h1 class="text-3xl font-bold mb-8">Recent posts in your feed</h1>

        <div class="grid gap-6">
            @forelse($posts as $post)
                @if($post['applicationName'] === 'reddit')
                    <div class="block transition-all duration-200 hover:transform hover:shadow-lg hover:shadow-yellow-500/10 hover:border-yellow-500 hover:scale-[1.02]">
                        <div class="bg-[#1e1e1e] border border-gray-700 hover:border-yellow-500 rounded-2xl p-6 shadow-md shadow-black/20">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-100 group-hover:text-yellow-500">{{ $post['title'] }}</h2>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-sm text-gray-500">
                                            Posted by u/{{ $post['author'] }} in r/{{ $post['subreddit'] }} • {{ \Carbon\Carbon::parse($post['created_utc'])->format('M d, Y') }}
                                        </span>
                                        @if($post['flair'])
                                            <span class="bg-yellow-900 text-yellow-300 text-xs font-medium px-2 py-1 rounded-xl h-fit ms-2">
                                                {{ $post['flair'] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center text-yellow-500">
                                    <x-heroicon-s-link class="w-6 h-6"/>
                                </div>
                            </div>

                            @if($post['thumbnail'])
                                <div class="relative mb-4 rounded-xl overflow-hidden">
                                    <img src="{{ $post['thumbnail'] }}" alt="Post Image">
                                </div>
                            @endif

                            @if($post['video'])
                                <video controls class="w-full h-52 object-cover rounded-xl">
                                    <source src="{{ $post['video'] }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif

                            @if($post['selftext'])
                                <p class="text-gray-300 text-sm">
                                    {{ Str::limit($post['selftext'], 300) }}
                                </p>
                            @endif

                            <div class="flex items-center justify-between mt-4 text-gray-400 text-sm border-t border-gray-800 pt-4">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center gap-1">
                                        <x-heroicon-s-star class="w-6 h-6"/>
                                        {{ $post['score'] }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <x-heroicon-c-chat-bubble-oval-left class="w-6 h-6"/>
                                        {{ $post['num_comments'] }}
                                    </span>
                                </div>
                                <span class="text-yellow-500 flex items-center gap-1 hover:underline">
                                    View on Reddit
                                </span>
                            </div>
                        </div>
                    </div>

                @elseif($post['applicationName'] === 'twitter')
                    <a href="https://twitter.com/user/status/{{ $post['id'] }}" target="_blank"
                       class="block transition-all duration-200 hover:transform hover:scale-[1.02] hover:shadow-lg hover:shadow-yellow-500/10 hover:border-yellow-500">
                        <div class="bg-[#1e1e1e] border border-gray-700 hover:border-yellow-500 rounded-2xl p-6 shadow-md shadow-black/20">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center text-white">
                                        {{-- <x-icon-twitter /> --}}
                                    </div>
                                    <div>
                                        <h2 class="text-md font-semibold text-white-100">@users
                                            <span class="text-gray-500 font-normal"> · Tweet ID: {{ Str::limit($post['id'], 8, '') }}</span>
                                        </h2>
                                        <p class="text-base text-gray-200 mt-1">
                                            {{ $post['text'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center text-yellow-500">
                                    <x-heroicon-s-link class="w-6 h-6"/>
                                </div>
                            </div>

                            @if($post['image'])
                                <div class="mt-3 mb-4 rounded-xl overflow-hidden">
                                    <img src="{{ $post['image'] }}" alt="Tweet Image" class="w-full max-h-80 object-cover">
                                </div>
                            @endif

                            <div class="flex items-center justify-between mt-4 text-gray-400 text-sm border-t border-gray-800 pt-4">
                                <div class="flex items-center gap-5">
                                    <span class="flex items-center gap-1 hover:text-yellow-500"><x-heroicon-s-heart class="w-6 h-6"/></span>
                                    <span class="flex items-center gap-1 hover:text-yellow-500"><x-heroicon-c-chat-bubble-oval-left class="w-6 h-6"/></span>
                                    <span class="flex items-center gap-1 hover:text-yellow-500"><x-heroicon-s-share class="w-6 h-6"/></span>
                                </div>
                                <span class="text-yellow-500 flex items-center gap-1 hover:underline">
                                    View on Twitter
                                </span>
                            </div>
                        </div>
                    </a>
                @endif
            @empty
                <div class="bg-[#1e1e1e] border border-gray-700 rounded-xl p-8 shadow-md shadow-black/20 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-yellow-800/30 flex items-center justify-center">
                        <x-heroicon-s-share />
                    </div>
                    <h2 class="text-xl font-semibold mb-2">Your feed is empty</h2>
                    <p class="text-gray-400">Select a category from the left sidebar to view posts</p>
                </div>
            @endforelse
        </div>
    </main>
</div>
@endsection
