<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends BaseUser
{
    use Notifiable;
    use HasRoles;

    public const ADMIN = 1;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getMaintenanceFields(): array
    {
        return [
            'username',
            'password' => [
                'type' => 'password',
            ],
        ];
    }
}
