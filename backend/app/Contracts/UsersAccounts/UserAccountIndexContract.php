<?php

namespace App\Contracts\UsersAccounts;

use Illuminate\Http\Resources\Json\JsonResource;

interface UserAccountIndexContract
{
    public function __invoke(): JsonResource;
}
