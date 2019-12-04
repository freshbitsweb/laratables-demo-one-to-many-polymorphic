<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
    */
    public $timestamps = false;

    /**
     * Get all of the video's likes.
    */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
}
