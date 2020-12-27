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

    /**
     * 投稿が既読になっているか判定
     *
     * @return bool
     */
    public function is_read()
    {
        $id = Auth::id();

        $readers = array();
        foreach($this->reads as $read) {
            array_push($readers, $read->user_id);
        }

        if (in_array($id, $readers)) {
            return true;
        } else {
            return false;
        }
    }
}
