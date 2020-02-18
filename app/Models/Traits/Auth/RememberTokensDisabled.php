<?php

namespace App\Models\Traits\Auth;

trait RememberTokensDisabled
{
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
}
