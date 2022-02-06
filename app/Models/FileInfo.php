<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileInfo extends Model
{
    public function fileable()
    {
        return $this->morphTo();
    }
}
