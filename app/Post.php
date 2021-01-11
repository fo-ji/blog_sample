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
}
