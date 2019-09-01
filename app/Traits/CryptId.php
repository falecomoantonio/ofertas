<?php


namespace App\Traits;


trait CryptId
{
    public function getCryptIdAttribute()
    {
        try {
            return encrypt($this->original[$this->primaryKey]);
        } catch(\Exception $e) {
            return null;
        }
    }
}
