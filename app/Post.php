<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all of the post's likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    /**
     * Eager load likes value of the post.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function laratablesQueryConditions($query)
    {
        return $query->with('likes');
    }

    /**
     * Display the relationship data in custom column(post_liked).
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
    public static function laratablesImageUrl($post)
    {
        return '<img src="'.$post->image_url.'">';
    }

    /**
     * Searching the post_liked column data.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string search term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function laratablesSearchPostLiked($query, $searchValue)
    {
        return $query->orWhereHas('likes', function ($query) use ($searchValue) {
            $query->where('name', 'like', "%" .$searchValue. "%");
        });
    }
}
