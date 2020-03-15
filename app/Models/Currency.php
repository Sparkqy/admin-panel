<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Currency extends Model
{
    const SYSTEM_CURRENCY_CODE_COOKIE_NAME = 'system_currency_code';

    /**
     * @var array
     */
    public $fillable = ['code', 'symbol', 'rate'];

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'code';
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeMain(Builder $builder): Builder
    {
        return $builder->where('is_main', 1);
    }

    /**
     * @return bool
     */
    public function isMain(): bool
    {
        return $this->code === 1;
    }

    /**
     * @param Builder $builder
     * @param string $code
     * @return Builder
     */
    public function scopeByCode(Builder $builder, string $code): Builder
    {
        return $builder->where('code', $code);
    }
}
