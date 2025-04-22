<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Link;
use App\Services\FormatApi\FormatApiFactory;

class PostAggregator
{
    private FormatApiFactory $formatApi;
    private Link $link;

    public function __construct(FormatApiFactory $formatApi, Link $link)
    {
        $this->formatApi = $formatApi;
        $this->link = $link;
    }

    public function fetchAllPosts(): array
    {
        $posts = [];

        $links = $this->link::all();

        foreach ($links as $link) {
            /**
             * @var FormatApiDataInterface $formatter
             */
            $formatter = $this->formatApi->create($link->getApplicationName());
            $fetchedPost = $formatter->ApiCall($link->getUrl());

            if(is_array($fetchedPost)) {
                $posts[] = $fetchedPost;
            } 
        }

        return array_merge(...$posts);
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
            $formatter = $this->formatApi->create($link->getApplicationName());
            $fetchedPost = $formatter->ApiCall($link->getUrl());

            if(is_array($fetchedPost)) {
                $posts[] = $fetchedPost;
            } 
        }

        return array_merge(...$posts);
    }
}
