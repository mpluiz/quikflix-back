<?php

namespace App\Services;

class ServiceBase
{
    protected $baseUrl = 'https://api.themoviedb.org/3';
    protected $posterBaseUrl = 'https://image.tmdb.org/t/p';
    protected $apiKey = '4ec327e462149c3710d63be84b81cf4f';
    protected $language = 'pt-BR';
    protected $page = 1;
    protected $sort_by;
    protected $genres;
    protected $query;

    public function queryFilter($query)
    {
        $this->page = $query['page'] ?? 1;
        $this->sort = $query['sort_by'] ?? 'popularity.asc';
        $this->genres = $query['with_genre'] ?? null;
        $this->query = $query['query'] ?? null;
    }
}
