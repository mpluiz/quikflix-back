<?php

namespace App\Contracts;

interface MovieInterface
{
    public function getDetails($request, $id);
}
