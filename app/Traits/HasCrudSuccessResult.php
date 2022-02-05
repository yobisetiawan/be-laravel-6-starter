<?php

namespace App\Traits;

trait HasCrudSuccessResult
{
    public function __successList($query)
    {
        return $this->resource::collection($query);
    }

    public function __successShow()
    {
        return new $this->resource($this->row);
    }

    public function __successDestroy()
    {
        return $this->__success();
    }

    public function __success()
    {
        return ['success' => true];
    }

    public function __successUpdate()
    {
        $key = $this->modelKey;
        return   ['success' => true, 'id' => $this->row->$key];
    }

    public function __successStore()
    {
        $key = $this->modelKey;
        return  ['success' => true, 'id' => $this->row->$key];
    }

    public function __successBulkStore()
    {
        return  ['success' => true];
    }
}
    