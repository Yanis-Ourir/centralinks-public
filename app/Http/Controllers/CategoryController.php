<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\PostAggregator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected PostAggregator $postAggregator;

    public function __construct(PostAggregator $postAggregator)
    {
        $this->postAggregator = $postAggregator;
    }

    public function index()
    {
        $categories = Category::all();
        return view('partials.sidenav', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();

        $category->name = $request->input('name');
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->route('feed')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts = $this->postAggregator->fetchCategoryPosts($category);
        $categories = Category::all();
        
        return view('categories.show', [
            'posts' => $posts,
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
