<?php

namespace App\Services\FileUploaders\Interfaces;

use Illuminate\Http\UploadedFile;

interface UploaderInterface
{
    /**
     * @param UploadedFile $file
     * @param string $path
     * @return string|false
     */
    public static function store(UploadedFile $file, string $path = 'uploads');

    public static function update();

    public static function destroy();
}
