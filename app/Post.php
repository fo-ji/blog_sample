<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function reads()
    {
        return $this->hasMany(Read::class, 'post_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'post_id');
    }

    /**
     * 投稿がお気に入りに登録されているか判定
     *
     * @return bool
     */
    public function is_favorite()
    {
        $id = Auth::id();

        $favoritePosts = array();
        foreach($this->favorites as $favorite) {
            array_push($favoritePosts, $favorite->user_id);
        }

        if (in_array($id, $favoritePosts)) {
            return true;
        } else {
            return false;
        }
    }
}
