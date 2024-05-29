<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provincia')->insert([
            ['nombre' => 'Ciudad Autónoma de Buenos Aires'],
            ['nombre' => 'Neuquén'],
            ['nombre' => 'San Luis'],
            ['nombre' => 'Santa Fe'],
            ['nombre' => 'La Rioja'],
            ['nombre' => 'Catamarca'],
            ['nombre' => 'Tucumán'],
            ['nombre' => 'Chaco'],
            ['nombre' => 'Formosa'],
            ['nombre' => 'Santa Cruz'],
            ['nombre' => 'Chubut'],
            ['nombre' => 'Mendoza'],
            ['nombre' => 'Entre Ríos'],
            ['nombre' => 'San Juan'],
            ['nombre' => 'Jujuy'],
            ['nombre' => 'Santiago del Estero'],
            ['nombre' => 'Río Negro'],
            ['nombre' => 'Corrientes'],
            ['nombre' => 'Misiones'],
            ['nombre' => 'Salta'],
            ['nombre' => 'Córdoba'],
            ['nombre' => 'Buenos Aires'],
            ['nombre' => 'La Pampa'],
            ['nombre' => 'Tierra del Fuego, Antártida e Islas del Atlántico Sur']
        ]);
    }
}
