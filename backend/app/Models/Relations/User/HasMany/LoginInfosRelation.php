<?php

namespace App\Models\Relations\User\HasMany;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\LoginInfo;


trait LoginInfosRelation
{
    public function loginInfos(): HasMany
    {
        return $this->hasMany(LoginInfo::class);
    }
}
