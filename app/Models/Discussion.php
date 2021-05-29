<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Discussion;
use App\Models\Post;
use App\Models\Category;

class Discussion extends Model
{
    protected $table = 'chatter_discussion';
    public $timestamps = true;
    protected $fillable = ['title', 'chatter_category_id', 'user_id', 'slug', 'color'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    function user2(){
        return $this->hasOne('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'chatter_category_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'chatter_discussion_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'chatter_discussion_id')->orderBy('created_at', 'ASC');
    }

    public function postsCount()
    {
        return $this->posts()
        ->selectRaw('chatter_discussion_id, count(*)-1 as total')
        ->groupBy('chatter_discussion_id');
    }

    public function users()
    {
        return $this->belongsToMany(config('chatter.user.namespace'), 'chatter_user_discussion', 'discussion_id', 'user_id');
    }
}
