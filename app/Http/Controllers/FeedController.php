<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
use App\Services\PostAggregator;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected Link $link;
    protected Category $category;
    protected PostAggregator $postAggregator;

    public function __construct(Link $link, Category $category, PostAggregator $postAggregator)
    {
        $this->category = $category;
        $this->link = $link;
        $this->postAggregator = $postAggregator;
    }
  
    public function index()
    {
        $categories = $this->category::all();
        $posts = $this->postAggregator->fetchAllPosts();

        return view('feed', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
