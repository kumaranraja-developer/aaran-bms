<?php

namespace Aaran\Assets\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageService
{
    /**
     * Save or replace an image.
     *
     * @param UploadedFile|null $image
     * @param string|null $oldImage
     * @param string $directory
     * @return string
     */
    public function save(?UploadedFile $image, ?string $oldImage = null, string $directory = 'images'): string
    {
        if ($image) {
            $filename = $image->getClientOriginalName();

            if ($oldImage && Storage::disk('public')->exists("$directory/$oldImage")) {
                Storage::disk('public')->delete("$directory/$oldImage");
            }

            $image->storeAs($directory, $filename, 'public');

            return $filename;
        }

        return $oldImage ?? 'no_image';
    }
}
