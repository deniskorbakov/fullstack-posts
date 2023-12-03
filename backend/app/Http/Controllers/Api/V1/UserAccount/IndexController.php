<?php

namespace App\Http\Controllers\Api\V1\UserAccount;

use App\Actions\UsersAccounts\UserAccountIndex;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexController
{
    public function __invoke(UserAccountIndex $action): JsonResource
    {
        return $action();
    }
}
