<?php

namespace Tests\Unit;

use Tests\TestCase;

class TrendingHttpTest extends TestCase
{
    public function testTrendingGet()
    {
        $response = $this->get('/api/v1/trending/movie/week');

        $response->assertStatus(200);
    }
}
