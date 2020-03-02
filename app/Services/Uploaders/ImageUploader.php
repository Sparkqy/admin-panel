<?php

namespace App\Services\Uploaders;

use App\Models\Employee;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageUploader
{
    /**
     * @param UploadedFile $file
     * @param string|null $path
     * @return string
     */
    public static function uploadProfileImage(UploadedFile $file, string $path = null): string
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

    /**
     * @param UploadedFile $file
     * @param string $oldPath
     * @param string|null $path
     * @return string
     */
    public static function updateProfileImage(UploadedFile $file, string $oldPath, string $path = null): string
    {
        self::deleteProfileImage($oldPath);

        return self::uploadProfileImage($file, $path);
    }

    /**
     * @param string $path
     * @return bool
     */
    public static function deleteProfileImage(string $path): bool
    {
        if ($path !== Employee::NO_PROFILE_IMAGE_PATH && File::exists($path)) {
            return File::delete($path);
        }

        return false;
    }
}
