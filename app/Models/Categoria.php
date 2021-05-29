<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorias';

    protected $fillable = [
        'nombre', 'description','clase',
    ];

}
