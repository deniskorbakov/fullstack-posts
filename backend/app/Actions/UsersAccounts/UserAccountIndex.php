<?php

namespace App\Actions\UsersAccounts;

use App\Contracts\UsersAccounts\UserAccountIndexContract;
use App\Http\Resources\UserAccountResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAccountIndex implements UserAccountIndexContract
{
    public function __invoke(): JsonResource
    {
        return new UserAccountResource(User::findOrFail(auth()->id()));
    }
}
