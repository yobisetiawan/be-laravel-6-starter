<?php

namespace App\Traits;

trait HasCrudRedirect
{
    public $redirectSuccess = '/';

    public function __redirectSuccessStored()
    {
        return $this->redirectSuccess;
    }

    public function __redirectSuccessUpdated()
    {
        return $this->redirectSuccess;
    }

    public function __redirectSuccessDeleted()
    {
        return $this->redirectSuccess;
    }
}
