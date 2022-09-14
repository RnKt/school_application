<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Administrator
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Administrator extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
