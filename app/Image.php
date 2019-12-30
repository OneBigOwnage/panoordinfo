<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $original_file_name
 * @property string $file_path
 * @property string $mime_type
 * @property int    $size
 */
class Image extends Model
{
    use SoftDeletes;

    protected $guarded = [ ];

    /**
     * Retrieve the absolute file path on disk, of the image file linked to this recordl
     *
     * @return string The absolute file path of the image file.
     */
    public function absoluteFilePath()
    {
        return storage_path('app/' . $this->file_path);
    }

    /**
     * Retrieve the URL to show this image in the browser.
     *
     * @return string The generated URL.
     */
    public function toShowURL()
    {
        return route('images.show', $this);
    }

    /**
     * Turn the image file that is linked to this record into a file response, which will show the image in the
     * browser.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse The generated response.
     */
    public function toShowResponse()
    {
        return response()->file(
            $this->absoluteFilePath()
        );
    }

    /**
     * Delete the image file that is linked to this record.
     *
     * @return Image $this.
     */
    public function unlinkFile()
    {
        unlink($this->absoluteFilePath());

        return $this;
    }
}
