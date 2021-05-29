<?php

use Illuminate\Database\Seeder;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rol' => 'Administrador',
            'created_at' => '2021/04/07',
            'updated_at'=> '2021/04/07',
        ]);

        DB::table('roles')->insert([
            'rol' => 'Cliente',
            'created_at' => '2021/04/07',
            'updated_at'=> '2021/04/07',
        ]);
    }
}
