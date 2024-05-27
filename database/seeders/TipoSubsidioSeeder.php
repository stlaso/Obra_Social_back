<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSubsidioSeeder extends Seeder // Cambiamos el nombre del seeder
{
    public function run(): void
    {
        DB::table('tipo_subsidio')->insert([
            ['nombre' => 'APOYO ESCOLAR'],
            ['nombre' => 'APOYO SECUNDARIO'],
            [ 'nombre' => 'APOYO TRABAJADOR/UNIVERSITARIO'],
            ['nombre' => 'CASAMIENTO'],
            [ 'nombre' => 'FALLECIMIENTO DE FAMILIAR DIRECTO'],
            ['nombre' => 'FALLECIMIENTO DEL TITULAR'],
            [ 'nombre' => 'NACIMIENTO']
        ]);
    }
}
