<?php

namespace App\Services;

use App\Contracts\HandleResponseInterface;
use App\Contracts\MovieInterface;
use Illuminate\Support\Facades\Http;
use Exception;

class MovieService extends ServiceBase implements MovieInterface
{
    private $handleResponse;

    public function __construct(HandleResponseInterface $handleResponseInterface)
    {
        $this->handleResponse = $handleResponseInterface;
    }

    public function getDetails($request, $id) {
        try {
            $this->queryFilter($request->query());
            $response = Http::get("{$this->baseUrl}/movie/{$id}?api_key={$this->apiKey}&language={$this->language}");
            return $this->handleResponse->handle($response);
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
