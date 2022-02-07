<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileInfo extends Model
{
    protected $fillable = [
       'url',
       'path',
       'disk',
       'size',
       'mime_type',
       'data',
       'name',
       'slug'
    ];


    public function fileable()
    {
        return $this->morphTo();
    }
}
