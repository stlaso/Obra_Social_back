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
            ['nombre' => 'ACTA DEFUNCION'],
            ['nombre' => 'CERTIFICADO DE MATRIMONIO'],
            ['nombre' => 'CERTIFICADO DE NACIMIENTO'],
            ['nombre' => 'CONSTANCIA DE ALUMNO REGULAR'],
            ['nombre' => 'FORMULARIO DE ALTA'],
            ['nombre' => 'FOTOCOPIA DEL DNI'],
            ['nombre' => 'TELEGRAMA DE BAJA'],
        ]);
    }
}
