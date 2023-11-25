<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UserAccountResource;
use App\Models\User;

class UserAccountController extends Controller
{
    public function index()
    {
        return new UserAccountResource(User::findOrFail(auth()->id()));
    }
}
