<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as XImage;

class UploadService
{

    public $disk = 'public';

    public $file;

    public $path;

    public $filename;

    public $option = 'public';

    public function __construct($file, $path, $filename = null, $disk = null, $option = null)
    {
        $this->file = $file;

        $this->path = $path;

        $this->filename = ($filename ?? time()) . '.' . $this->file->getClientOriginalExtension();

        $this->disk = $disk ?? $this->disk;

        $this->option = $option ?? $this->option;
    }

    public function uploadResize($size = 100)
    {

        $img = XImage::make($this->file->getRealPath());

        $img->resize($size, $size, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->stream();

        Storage::disk($this->disk)->put($this->path . '/' . $this->filename, $img, $this->option);
    }

    public function upload()
    {
        Storage::disk($this->disk)->put($this->path . '/' . $this->filename, file_get_contents($this->file), $this->option);
    }

    public function getURL()
    {
        return Storage::disk($this->disk)->url($this->path . '/' . $this->filename);
    }
}
