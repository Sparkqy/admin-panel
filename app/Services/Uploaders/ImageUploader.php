<?php

namespace App\Services\Uploaders;

use App\Models\Employee;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageUploader
{
    /**
     * @param UploadedFile $file
     * @param string|null $path
     * @return string
     */
    public static function storeProfileImage(UploadedFile $file, string $path = null): string
    {
        $path = $path === null
            ? Employee::PROFILE_IMAGE_PATH
            : $path;

        if (!is_dir($path)) {
            mkdir($path);
        }

        $fileName = time() . '_' . $file->getClientOriginalName();

        Image::make($file->getRealPath())
            ->resize(300, 300)
            ->save(public_path($path) . '/' . $fileName, 80);

        return $path . '/' . $fileName;
    }
}
