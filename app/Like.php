<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
    */
    public $timestamps = false;

    /**
     * Get the owning likeable model.
    */
    public function likeable()
    {
        return $this->morphTo();
    }
}
