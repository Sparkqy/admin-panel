<?php

namespace App\Models;

use App\Services\Currencies\CurrencyConverter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    const PROFILE_IMAGE_PATH = 'uploads/profile-images';
    const NO_PROFILE_IMAGE_PATH = self::PROFILE_IMAGE_PATH . '/no-avatar.png';

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
        'head_id',
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
     * @var array
     */
    protected $dates = ['date_of_employment'];

    /**
     * @param float $value
     * @return float|int
     */
    public function getSalaryAttribute(float $value)
    {
        return round(CurrencyConverter::convert($value), 3);
    }

    /**
     * @return BelongsTo
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * @return BelongsTo
     */
    public function head(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'head_id');
    }

    /**
     * @return BelongsTo
     */
    public function adminCreated(): BelongsTo
    {
        return $this->belongsTo(Administrator::class, 'admin_created_id');
    }
}
