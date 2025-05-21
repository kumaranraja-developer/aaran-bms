<?php

namespace Aaran\Assets\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageService
{
    public function save(?UploadedFile $image, ?string $oldImage = null, string $directory = 'images', string $name = null): string
    {
        if ($image) {
            // Determine extension
            $extension = $image->getClientOriginalExtension();

            // Determine filename
            if ($name) {
                // If $name includes an extension, use it; otherwise append original extension
                $filename = pathinfo($name, PATHINFO_EXTENSION)
                    ? $name
                    : Str::slug(pathinfo($name, PATHINFO_FILENAME)) . '.' . $extension;
            } else {
                $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $extension;
            }

            // Delete old image if it exists
            if ($oldImage && Storage::disk('public')->exists("$directory/$oldImage")) {
                Storage::disk('public')->delete("$directory/$oldImage");
            }

            // Store new image
            $image->storeAs($directory, $filename, 'public');

            return $filename;
        }
        return $oldImage ?? 'no_image';
    }
}
