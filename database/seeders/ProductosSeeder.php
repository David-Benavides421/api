<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productosSeeder extends Seeder{

    public function run(){
        DB::table('productos')->insert([
            'nombre' => 'producto de Prueba 1',
            'descripcion' => 'Esta es una descripcion de prueba para el roducto 1.',
            'precio' => 19.99,
        ]);

        DB::table('productos')->insert([
            'nombre' => 'producto de Prueba 2',
            'descripcion' => 'Esta es una descripcion de prueba para el roducto 2.',
            'precio' => 20.00,
        ]);
    }
}