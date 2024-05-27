<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estado_civil')->insert([
            ['nombre' => 'APOYO ESCOLAR'],
            ['nombre' => 'APOYO SECUNDARIO'],
            ['nombre' => 'APOYO TRABAJADOR/UNIVERSITARIO'],
            ['nombre' => 'CASAMIENTO'],
            ['nombre' => 'FALLECIMIENTO DE FAMILIAR DIRECTO'],
            ['nombre' => 'FALLECIMIENTO DEL TITULAR'],
            ['nombre' => 'NACIMIENTO']
        ]);
    }
}
