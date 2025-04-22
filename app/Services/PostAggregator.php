<?php
namespace App\Service;

use App\Models\Category;
use App\Models\Link;
use App\Service\FormatApiFactory;
use App\Service\FormatApiDataInterface;


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

        $links = $this->link::findAll();

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

        $links = $category->getLinks();
    

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
