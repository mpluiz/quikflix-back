<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\TrendingInterface;

class TrendingController extends Controller
{
    private $trending;

    public function __construct(TrendingInterface $trending)
    {
        $this->trending = $trending;
    }

    public function getTrending(Request $request, $media_type, $time_window)
    {
        return response()->json($this->trending->getTrending($media_type, $time_window));
    }
}
