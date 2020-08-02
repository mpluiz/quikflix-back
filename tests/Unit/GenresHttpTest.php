<?php

namespace Tests\Unit;

use Tests\TestCase;

class GenresHttpTest extends TestCase
{
    public function testGenresGet()
    {
        $response = $this->get('/api/v1/genre/movie/list');

        $response->assertStatus(200);
    }
}
