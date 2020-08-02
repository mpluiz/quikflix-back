<?php

namespace App\Services;

use App\Contracts\HandleResponseInterface;

class HandleResponseService implements HandleResponseInterface
{
    public function handle($response) {
        if ($response->successful()) {
            $response = json_decode($response->body());
        } else if ($response->serverError()) {
             return $response->throw();
        }

        return $response;
    }
}
