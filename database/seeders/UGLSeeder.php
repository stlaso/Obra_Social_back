<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UGLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_ugl')->insert([
            ['nombre' => 'LANUS'],
            ['nombre' => 'BAHIA BLANCA'],
            ['nombre' => 'CAPITAL FEDERAL'],
            ['nombre' => 'CORDOBA'],
            ['nombre' => 'CORRIENTES'],
            ['nombre' => 'CHUBUT'],
            ['nombre' => 'DAMNPYP'],
            ['nombre' => 'ENTRE RIOS'],
            ['nombre' => 'LA PLATA'],
            ['nombre' => 'LA PAMPA'],
            ['nombre' => 'LUJAN'],
            ['nombre' => 'MENDOZA'],
            ['nombre' => 'MILSTEIN'],
            ['nombre' => 'MISIONES'],
            ['nombre' => 'ROSARIO'],
            ['nombre' => 'SALTA'],
            ['nombre' => 'SAN JUSTO'],
            ['nombre' => 'SAN JUAN'],
            ['nombre' => 'TUCUMAN'],
            ['nombre' => 'CHIVILCOY'],
            ['nombre' => 'AZUL'],
            ['nombre' => 'NACIONAL'],
            ['nombre' => 'CATAMARCA'],
            ['nombre' => 'CHACO'],
            ['nombre' => 'TIERRA DEL FUEGO']
        ]);
    }
}
