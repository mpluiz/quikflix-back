<?php

namespace Tests\Unit;

use Tests\TestCase;

class SearchHttpTest extends TestCase
{
    public function testSearchGet()
    {
        $response = $this->get('/api/v1/search/movie?query=harry');

        $response->assertStatus(200);
    }
}
