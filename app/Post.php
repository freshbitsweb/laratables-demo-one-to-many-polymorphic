<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    /**
     * Get all of the post's comments.
    */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    /**
     * Display the relationship data in custom column(postLiked).
     *
     * @param \App\Post
     * @return string
    */
    public static function laratablesCustomPostLiked($post)
    {
        return $post->likes->implode('name', ',');
    }

    /**
     * Display image from url in table
     *
     * @param \App\Post
     * @return string
    */
    public static function laratablesUrl($post)
    {
        return "<img src='$post->url' width='700px' height=100px>";
    }

    /**
     * searching the postLiked column data.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string search term
     * @return \Illuminate\Database\Eloquent\Builder
    */
    public static function laratablesSearchPostLiked($query, $searchValue)
    {
        return $query->orWhereHas('likes', function($query) use($searchValue) {
            $query->where('name', 'like', "%" .$searchValue. "%");
        });
    }
}
