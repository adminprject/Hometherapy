<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Discussion;

class Category extends Model
{
    protected $table = 'chatter_categories';
    protected $fillable = [
        'order', 'name','color','slug',
    ];
    public $timestamps = true;

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
