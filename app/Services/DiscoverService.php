<?php

namespace App\Services;

use App\Contracts\DiscoverInterface;
use App\Contracts\HandleResponseInterface;
use Illuminate\Support\Facades\Http;
use Exception;

class DiscoverService extends ServiceBase implements DiscoverInterface
{
    private $handleResponse;


    public function __construct(HandleResponseInterface $handleResponseInterface)
    {
        $this->handleResponse = $handleResponseInterface;
    }

    public function movieDiscover($request)
    {
        try {
            $this->queryFilter($request->query());

            $response = Http::get("{$this->baseUrl}/discover/movie?api_key={$this->apiKey}&language={$this->language}&with_genres={$this->genres}");
            return $this->handleResponse->handle($response);
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
