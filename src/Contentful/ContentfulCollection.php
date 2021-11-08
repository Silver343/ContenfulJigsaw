<?php

namespace App\Contentful;

use Contentful\Delivery\Query;
use Contentful\Delivery\Client;

class ContentfulCollection
{
    public $client;

    public function __construct()
    {
        $this->client = new Client(
            env('CONTENTFUL_ACCESS_TOKEN'),
            env('CONTENTFUL_SPACE_ID')
        );
    }

    public function getPosts()
    {
        $query = (new Query)->setContentType('blogPost')
            ->orderBy('fields.publishDate', $descending = true);
        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return [
                    'filename' => $item->title,
                    'publishDate' => $item->publishDate,
                    'title' => $item->title,
                    'content' => $item->content,
                    'coverImage' => $item->hero?->getFile()->getUrl(),
                    'authors' => collect($item->authors)->map(function ($author)
                    {
                        return [$author->name];
                    })->flatten()
                ];
            });
    }

    public function getAuthors()
    {
        $query = (new Query)->setContentType('author')
            ->orderBy('fields.name', $descending = true);
        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return [
                   // dd($item->getAvatar()),
                    'filename' => $item->name,
                    'name' => $item->name,
                    'role' => $item->role,
                    'id' => $item->getId(),
                ];
            });
    }

    public function getAuthorsPosts($page)
    {
        $query = (new Query)->setContentType('blogPost')
            ->where('fields.authors.sys.id' , $page->id)
            ->orderBy('fields.publishDate', $descending = true);
        return collect($this->client->getEntries($query)->getItems())
            ->map(function ($item) {
                return [
                    'title' => $item->title,
                    'description' => $item->description,
                    'publishDate' => $item->publishDate,
                    'content' => $item->content,
                    'path' => str_replace(' ','-',$item->title),
                ];
            });
    }

}
