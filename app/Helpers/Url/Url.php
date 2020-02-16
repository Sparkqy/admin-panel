<?php

namespace App\Helpers\Url;

class Url
{
    /**
     * @param string $string
     * @param string|null $url
     * @return bool
     */
    public static function hasString(string $string, string $url = null): bool
    {
        if ($url === null) {
            $url = url()->current();
        }

        return strpos($url, $string) !== false ? true : false;
    }
}
