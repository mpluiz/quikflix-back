<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\MovieInterface;

class MovieController extends Controller
{
    private $movie;

    public function __construct(MovieInterface $movie)
    {
        $this->movie = $movie;
    }

    public function getDetails(Request $request, $id)
    {
        return response()->json($this->movie->getDetails($request, $id));
    }
}
