<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Shared image handling for the admin CRUD controllers.
 *
 * Files live directly under public/uploads so shared hosting never needs a
 * storage:link symlink. Stored paths are web-relative ("uploads/products/x.jpg")
 * and are passed straight to asset() in the views.
 */
trait HandlesImageUploads
{
    /**
     * Store an upload under public/uploads/{directory} and return its web-relative path.
     *
     * The "uploads" disk is configured with throw => true, so a failed write raises
     * instead of returning false and writing a broken "uploads/" path to the database.
     */
    protected function storeImage(UploadedFile $image, string $directory): string
    {
        return 'uploads/'.$image->store($directory, 'uploads');
    }

    /**
     * Remove a previously stored image. Ignores anything that is not one of ours
     * (legacy rows, external URLs, or the empty string) so we never delete by accident.
     */
    protected function deleteImage(?string $path): void
    {
        if (! $path || ! str_starts_with($path, 'uploads/')) {
            return;
        }

        $relative = substr($path, strlen('uploads/'));

        if ($relative !== '') {
            Storage::disk('uploads')->delete($relative);
        }
    }
}
