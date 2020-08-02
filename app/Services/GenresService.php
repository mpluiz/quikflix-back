<?php

namespace App\Services;

use App\Contracts\GenresInterface;
use App\Contracts\HandleResponseInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Exception;

class GenresService extends ServiceBase implements GenresInterface
{
    private $handleResponse;

    public function __construct(HandleResponseInterface $handleResponseInterface)
    {
        $this->handleResponse = $handleResponseInterface;
    }

    public function getGenresList() {
        try {
            $response = Http::get("{$this->baseUrl}/genre/movie/list?api_key={$this->apiKey}&language={$this->language}&page={$this->page}");
            $response = $this->handleResponse->handle($response);
            return $this->sortGenres($response);
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function sortGenres($response) {
        return array_values(Arr::sort($response->genres, function ($genre) {
            return $genre->name;
        }));
    }
}
