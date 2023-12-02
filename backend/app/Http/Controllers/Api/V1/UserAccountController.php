<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\UsersAccounts\UserAccountIndex;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAccountController extends Controller
{
    public function index(UserAccountIndex $action): JsonResource
    {
        return $action();
    }
}
