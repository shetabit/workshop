<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface Repository
{
    public function create(Request $request);
}
