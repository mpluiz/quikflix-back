<?php

namespace App\Services;

use App\Contracts\TrendingInterface;
use App\Contracts\HandleResponseInterface;
use Illuminate\Support\Facades\Http;
use Exception;

class TrendingService extends ServiceBase implements TrendingInterface
{
    private $handleResponse;

    public function __construct(HandleResponseInterface $handleResponseInterface)
    {
        $this->handleResponse = $handleResponseInterface;
    }

    public function getTrending($media_type, $time_window)
    {
        try {
            $response = Http::get("{$this->baseUrl}/trending/{$media_type}/{$time_window}?api_key={$this->apiKey}&language={$this->language}&page={$this->page}");
            return $this->handleResponse->handle($response);
        } catch (\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
