<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $timestamps = false;

    /**
     * Get all of the video's comments.
    */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
}
