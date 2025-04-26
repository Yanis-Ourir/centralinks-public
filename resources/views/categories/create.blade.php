@extends('base')

@section('title', 'Create your category')

@section('body')

<div class="flex min-h-screen bg-[#161616] text-white">
  

    <main class="flex-1 p-10">
        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 mb-8">
            <h1 class="text-3xl font-bold text-white">Create your category</h1>
        </div>

        <form action="{{ route('categories.store') }}" method="POST" class="bg-[#1e1e1e] border border-gray-700 rounded-2xl p-6 shadow-md shadow-black/20 w-1/2 justify-center mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-300">Category Name</label>
                <input type="text" name="name" id="name" required class="mt-1 p-2 block w-full bg-[#161616] border border-gray-700 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-gray-300 placeholder-gray-500" placeholder="Enter category name">
            </div>

            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium px-5 py-2.5 rounded-lg transition-all shadow-lg hover:shadow-yellow-500/20 transform hover:-translate-y-0.5">Create Category</button>
        </form>
    </main>
</div>

@endsection