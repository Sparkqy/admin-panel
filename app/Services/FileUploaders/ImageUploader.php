<?php

namespace App\Services\FileUploaders;

use App\Services\FileUploaders\Interfaces\UploaderInterface;
use Illuminate\Http\UploadedFile;

class ImageUploader implements UploaderInterface
{
    /**
     * @inheritDoc
     */
    public static function store(UploadedFile $file, string $path = 'uploads')
    {
        return $file->store($path);
    }

    public static function update()
    {
        // TODO: Implement update() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
