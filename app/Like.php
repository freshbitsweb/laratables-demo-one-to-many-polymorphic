<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false;

    /**
     * Get the owning likeable model.
    */
    public function likeable()
    {
        return $this->morphTo();
    }
}
