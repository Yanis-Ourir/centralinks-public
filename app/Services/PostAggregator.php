<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Link;
use App\Services\FormatApi\FormatApiFactory;

class PostAggregator
{
    private FormatApiFactory $formatApi;
    private Link $link;
    private Category $category;

    public function __construct(FormatApiFactory $formatApi, Link $link, Category $category)
    {
        $this->formatApi = $formatApi;
        $this->link = $link;
        $this->category = $category;
    }

    public function fetchAllPosts(): array
    {
        $posts = [];

        $categories = $this->category::where('user_id', auth()->user()->id)->get();
     
        if($categories->isEmpty()) {
            return $posts;
        }

        foreach($categories as $category) {
            $links = $category->links()->get();

            foreach ($links as $link) {
                /**
                 * @var FormatApiDataInterface $formatter
                 */
                $formatter = $this->formatApi->create($link->application_name);
                $fetchedPost = $formatter->ApiCall($link->url);
    
                if(is_array($fetchedPost)) {
                    $posts[] = $fetchedPost;
                } 
            }
    
            return array_merge(...$posts);
        }
        
        return $posts;
    }

    public function fetchCategoryPosts(Category $category): array
    {
        $posts = [];

        $links = $category->links()->get();

        if($links->isEmpty()) {
            return $posts;
        }

        foreach ($links as $link) {
            /**
             * @var FormatApiDataInterface $formatter
             */
            $formatter = $this->formatApi->create($link->application_name);
            $fetchedPost = $formatter->ApiCall($link->url);

            if(is_array($fetchedPost)) {
                $posts[] = $fetchedPost;
            } 
        }

        return array_merge(...$posts);
    }
}
