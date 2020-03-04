<?php

namespace App\Models;

use App\Models\Traits\Auth\RememberTokensDisabled;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use Notifiable;

    const ADMIN_ROLE = 1;
    const MANAGER_ROLE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'profile_image',
        'password',
        'role',
    ];
}
