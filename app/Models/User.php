<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Disable remember token getter
     * @return string|null
     */
    public function getRememberToken()
    {
        return null;
    }

    /**
     * Disable remember token setter
     * @param string $value
     */
    public function setRememberToken($value)
    {

    }

    /**
     * Disable remember token name getter
     * @return string|null
     */
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
        'boss_id',
        'password',
        'date_of_employment',
        'admin_created_id',
        'admin_updated_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * @return BelongsTo
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
