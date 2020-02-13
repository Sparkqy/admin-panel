<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {}

    public function getRememberTokenName()
    {
        return null;
    }

    /**
     * Overrides the method to ignore the remember token.
     * @param string $key
     * @param $value
     */
    public function setAttribute($key, $value)
    {
        if (!$key == $this->getRememberTokenName()) {
            parent::setAttribute($key, $value);
        }
    }

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
        'salary',
        'position_id',
        'password',
        'admin_created_id',
        'admin_updated_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];
}
