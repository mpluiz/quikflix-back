<?php

namespace App\Services;

use App\Contracts\HandleResponseInterface;
use App\Contracts\SearchInterface;
use Illuminate\Support\Facades\Http;
use Exception;

class SearchService extends ServiceBase implements SearchInterface
{
    private $handleResponse;

    public function __construct(HandleResponseInterface $handleResponseInterface)
    {
        $this->handleResponse = $handleResponseInterface;
    }

    public function searchMovies($request) {
        try {
            $this->queryFilter($request->query());
            $response = Http::get("{$this->baseUrl}/search/movie?api_key={$this->apiKey}&language={$this->language}&query={$this->query}&page={$this->page}");
            $response = $this->handleResponse->handle($response);
            return $this->genreFilter($response, $this->genres);
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function genreFilter($response, $with_genre)
    {
        if ($with_genre === 'default' || $with_genre === null) {
            return $response;
        }

        $collection = collect($response->results);

        $filtered = $collection->filter(function ($value, $key) use ($with_genre) {
            foreach ($value->genre_ids as $genre) {
                return $genre == $with_genre;
            }
        });

        $response->results = array();

        foreach ($filtered as $movie) {
            array_push($response->results, $movie);
        }

        return $response;
    }
}
