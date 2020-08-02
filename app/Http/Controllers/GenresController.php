<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\GenresInterface;

class GenresController extends Controller
{
    private $genres;

    public function __construct(GenresInterface $genres)
    {
        $this->genres = $genres;
    }

    public function getGenresList()
    {
        return response()->json($this->genres->getGenresList());
    }
}
