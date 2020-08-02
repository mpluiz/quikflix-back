<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\DiscoverInterface;

class DiscoverController extends Controller
{
    private $discover;

    public function __construct(DiscoverInterface $discover)
    {
        $this->discover = $discover;
    }

    public function movieDiscover(Request $request)
    {
        return response()->json($this->discover->movieDiscover($request));
    }
}
