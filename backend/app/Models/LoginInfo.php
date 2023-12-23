<?php

namespace App\Models;

use App\Models\Relations\LoginInfo\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string|null $platform
 * @property string|null $device
 * @property string|null $browser
 * @property string|null $country
 * @property string|null $city_name
 * @property boolean $robot
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 *
 * @property Collection<User> $user
 */
class LoginInfo extends Model
{
    //Belong To Relations
    use UserRelation;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip',
        'platform',
        'device',
        'browser',
        'country',
        'city_name',
        'robot',
        'created_at'
    ];
}
