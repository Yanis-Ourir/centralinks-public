<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    protected Category $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('link.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'application_name' => 'required|string|max:255',
        ]);

        $link = new Link();
        $url = $request->input('url');

        $request->input('application_name') === 'reddit' ? $link->url = $url . '.json' : $link->url = $url;

        $link->application_name = $request->input('application_name');
        $link->save();

        $categoryId = $request->input('category_id');
        $link->categories()->attach($categoryId);
    
        $link->save();

        return redirect()->route('categories.show', ['category' => $categoryId])->with('success', 'Link created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
