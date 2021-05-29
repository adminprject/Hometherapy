<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Electronicos',
            'description' => 'Marcancia de las categorias de ejemplo',
            'clase' => 'filter-electro',
            'created_at' => '2021/04/07',
            'updated_at'=> '2021/04/07',
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Deportivos',
            'description' => 'Marcancia de las categorias de ejemplo',
            'clase' => 'filter-sport',
            'created_at' => '2021/04/07',
            'updated_at'=> '2021/04/07',
        ]);

    }
}
