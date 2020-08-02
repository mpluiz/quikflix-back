<?php

namespace Tests\Unit;

use Tests\TestCase;

class MovieHttpTest extends TestCase
{
    public function testMovieGet()
    {
        $response = $this->get('/api/v1/movie/516486');

        $response->assertStatus(200);
    }
}
