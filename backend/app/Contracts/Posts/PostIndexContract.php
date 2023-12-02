<?php

namespace App\Contracts\Posts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface PostIndexContract
{
    public function __invoke(Request $request): AnonymousResourceCollection;
}
