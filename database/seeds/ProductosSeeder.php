<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('productos')->insert([
            'nombre' => 'Producto 1',
            'categoria_id' => 1,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-1',
            'ext' => 'jpg',
            'precio' => 10000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 2',
            'categoria_id' => 1,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-2',
            'ext' => 'jpg',
            'precio' => 15000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 3',
            'categoria_id' => 1,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-3',
            'ext' => 'jpg',
            'precio' => 20000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 4',
            'categoria_id' => 2,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-4',
            'ext' => 'jpg',
            'precio' => 250000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 5',
            'categoria_id' => 2,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-5',
            'ext' => 'jpg',
            'precio' => 30000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 6',
            'categoria_id' => 2,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-6',
            'ext' => 'jpg',
            'precio' => 35000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 7',
            'categoria_id' => 1,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-7',
            'ext' => 'jpg',
            'precio' => 40000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 8',
            'categoria_id' => 2,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-8',
            'ext' => 'jpg',
            'precio' => 45000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);

		DB::table('productos')->insert([
            'nombre' => 'Producto 9',
            'categoria_id' => 2,
            'description' => 'La función por defecto genera una cadena de texto de 8 caracteres de longitud. Hacemos uso de la función mt_rand (la cual es más rápida que rand, pero dependerá de las circunstancias su uso) que nos devolverá un valor aleatorio entre 0 y el número total de caracteres que contiene la variable $possible. Mediante substr extraemos un caracter de la ubicación generada al azar. Al final tenemos una cadena aleatoria de este tipo: qsd9pt4p. Muy útil para generar contraseñas aleatorias por defecto.',
            'url' => 'img/portfolio/portfolio-9',
            'ext' => 'jpg',
            'precio' => 50000,
            'created_at' => '2021/04/07',
            'updated_at' => '2021/04/07',
        ]);



    }
}
