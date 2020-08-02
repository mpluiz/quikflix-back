<?php

namespace Tests\Unit;

use Tests\TestCase;

class DiscoverHttpTest extends TestCase
{
    public function testDiscoverGet()
    {
        $response = $this->get('/api/v1/discover/movie?with_genres=12');

        $response->assertStatus(200);
    }
}
