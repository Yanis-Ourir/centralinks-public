@extends('base')

@section('title', 'Add your link')

@section('body')

<div class="flex min-h-screen bg-[#161616] text-white">
  

    <main class="flex-1 p-10 mt-24">
        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 mb-8">
            <h1 class="text-3xl font-bold text-white">Add a link to a category</h1>
        </div>

        <form action="{{ route('links.store') }}" method="POST" class="bg-[#1e1e1e] border border-gray-700 rounded-2xl p-6 shadow-md shadow-black/20 w-1/2 justify-center mx-auto">
            @csrf
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-300">Url link</label>
                <input type="text" name="url" id="name" required class="mt-1 p-2 block w-full bg-[#161616] border border-gray-700 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-gray-300 placeholder-gray-500" placeholder="Enter category name">
            </div>

            <div class="mb-4">
                <label for="application_name" class="block text-sm font-medium text-gray-300">Application Name</label>
                <input type="text" name="application_name" id="name" required class="mt-1 p-2 block w-full bg-[#161616] border border-gray-700 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-gray-300 placeholder-gray-500" placeholder="Enter category name">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-300">Select Category</label>
                <select name="category_id" id="category_id" required class="mt-1 p-2 block w-full bg-[#161616] border border-gray-700 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-gray-300 placeholder-gray-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            

            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium px-5 py-2.5 rounded-lg transition-all shadow-lg hover:shadow-yellow-500/20 transform hover:-translate-y-0.5">Create Category</button>
        </form>
    </main>
</div>

@endsection