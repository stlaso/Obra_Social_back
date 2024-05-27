<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_documento')->insert([ 
            ['nombre' => 'ACTA_DEFUNCION'],
            ['nombre' => 'CERTIFICADO_DE_MATRIMONIO'],
            ['nombre' => 'CERTIFICADO_DE_NACIMIENTO'],
            ['nombre' => 'CONSTANCIA_DE_ALUMNO_REGULAR'],
            ['nombre' => 'FORMULARIO_DE_ALTA'],
            ['nombre' => 'FOTOCOPIA_DEL_DNI'],
            ['nombre' => 'TELEGRAMA_DE_BAJA'],
        ]);
    }
}
