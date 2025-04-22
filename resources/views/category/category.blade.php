@extends('layouts.base')

@section('title', 'Category')

@section('body')
<div class="flex min-h-screen bg-[#161616] text-white">
    @include('partials.sidenav')

    <main class="flex-1 p-10 ml-64">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <h1 class="text-3xl font-bold text-white">{{ $category->name }} feed</h1>

            <a href="{{ route('link.create') }}" class="flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium px-5 py-2.5 rounded-lg transition-all shadow-lg hover:shadow-yellow-500/20 transform hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <span>Add Link to {{ $category->name }}</span>
            </a>
        </div>

        <div class="grid gap-6">
            @if (!empty($posts))
                @foreach ($posts as $post)
                    @if ($post->applicationName === 'reddit')
                        <a href="{{ $post->permalink }}" target="_blank" class="block transition-all duration-200 hover:transform hover:scale-[1.02] hover:shadow-lg hover:shadow-yellow-500/10 hover:border-yellow-500">
                            <div class="bg-[#1e1e1e] border border-gray-700 hover:border-yellow-500 rounded-2xl p-6 shadow-md shadow-black/20">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-100 group-hover:text-yellow-500">{{ $post->title }}</h2>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="text-sm text-gray-500">
                                                Posted by u/{{ $post->author }} in r/{{ $post->subreddit }} • {{ \Carbon\Carbon::parse($post->created_utc)->format('M d, Y') }}
                                            </span>
                                            @if ($post->flair)
                                                <span class="bg-yellow-900 text-yellow-300 text-xs font-medium px-2 py-1 rounded-xl h-fit ms-2">
                                                    {{ $post->flair }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center text-yellow-500">
                                        <svg ...>...</svg>
                                    </div>
                                </div>

                                @if ($post->thumbnail)
                                    <div class="relative mb-4 rounded-xl overflow-hidden">
                                        <img src="{{ $post->thumbnail }}" alt="Post Image" class="w-full h-52 object-cover">
                                    </div>
                                @endif

                                @if ($post->selftext)
                                    <p class="text-gray-300 text-sm">
                                        {{ Str::limit($post->selftext, 300, '...') }}
                                    </p>
                                @endif

                                <div class="flex items-center justify-between mt-4 text-gray-400 text-sm border-t border-gray-800 pt-4">
                                    <div class="flex items-center gap-4">
                                        <span class="flex items-center gap-1">
                                            <svg ...>...</svg>
                                            {{ $post->score }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg ...>...</svg>
                                            {{ $post->num_comments }}
                                        </span>
                                    </div>
                                    <span class="text-yellow-500 flex items-center gap-1 hover:underline">
                                        View on Reddit
                                    </span>
                                </div>
                            </div>
                        </a>
                    @elseif ($post->applicationName === 'twitter')
                        <a href="https://twitter.com/user/status/{{ $post->id }}" target="_blank" class="block transition-all duration-200 hover:transform hover:scale-[1.02] hover:shadow-lg hover:shadow-yellow-500/10 hover:border-yellow-500">
                            <div class="bg-[#1e1e1e] border border-gray-700 hover:border-yellow-500 rounded-2xl p-6 shadow-md shadow-black/20">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center text-white">
                                            <svg ...>...</svg>
                                        </div>
                                        <div>
                                            <h2 class="text-md font-semibold text-white-100">@user<span class="text-gray-500 font-normal"> · Tweet ID: {{ Str::limit($post->id, 8) }}</span></h2>
                                            <p class="text-base text-gray-200 mt-1">
                                                {{ $post->text }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-yellow-500">
                                        <svg ...>...</svg>
                                    </div>
                                </div>

                                @if ($post->image)
                                    <div class="mt-3 mb-4 rounded-xl overflow-hidden">
                                        <img src="{{ $post->image }}" alt="Tweet Image" class="w-full max-h-80 object-cover">
                                    </div>
                                @endif

                                <div class="flex items-center justify-between mt-4 text-gray-400 text-sm border-t border-gray-800 pt-4">
                                    <div class="flex items-center gap-5">
                                        <span class="flex items-center gap-1 hover:text-yellow-500">
                                            <svg ...>...</svg>
                                        </span>
                                        <span class="flex items-center gap-1 hover:text-yellow-500">
                                            <svg ...>...</svg>
                                        </span>
                                        <span class="flex items-center gap-1 hover:text-yellow-500">
                                            <svg ...>...</svg>
                                        </span>
                                    </div>
                                    <span class="text-yellow-500 flex items-center gap-1 hover:underline">
                                        View on Twitter
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            @endif

            @if (empty($posts))
                <div class="bg-[#1e1e1e] border border-gray-700 rounded-2xl p-6 shadow-md shadow-black/20">
                    <h2 class="text-xl font-semibold text-gray-100">No posts available</h2>
                    <a href="{{ route('link.create') }}" class="text-yellow-500 hover:underline">Add a new link to {{ $category->name }}</a>
                </div>
            @endif
        </div>
    </main>
</div>
@endsection
