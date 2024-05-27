<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nacionalidad')->insert([ // El nombre de la tabla es 'nacionalidad'
            ['nombre' => 'ARGENTINO'],
            ['nombre' => 'CHILENO'],
            ['nombre' => 'BOLIVIANO'],
            ['nombre' => 'PERUANO'],
            ['nombre' => 'PARAGUAYO'],
            ['nombre' => 'URUGUAYO'],
            ['nombre' => 'BRASILEÑO']
        ]);
    }
}
