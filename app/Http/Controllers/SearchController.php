<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\SearchInterface;

class SearchController extends Controller
{
    private $search;

    public function __construct(SearchInterface $search)
    {
        $this->search = $search;
    }

    public function searchMovies(Request $request)
    {
        return response()->json($this->search->searchMovies($request));
    }
}
