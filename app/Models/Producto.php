<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre', 'categoria_id','description','url','ext','precio',
    ];

    public function Categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}
