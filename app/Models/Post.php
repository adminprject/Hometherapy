<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'chatter_post';
    public $timestamps = true;
    protected $fillable = ['chatter_discussion_id', 'user_id', 'body', 'markdown'];

    public function discussion()
    {
        return $this->belongsTo('App\Discussion', 'chatter_discussion_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
