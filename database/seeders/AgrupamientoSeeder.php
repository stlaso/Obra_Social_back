<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgrupamientoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('agrupamiento')->insert([
            [ 'nombre' => 'ADMINISTRATIVO'],
            ['nombre' => 'CONTRATADO'],
            [ 'nombre' => 'PROFESIONAL'],
            [ 'nombre' => 'SERVICIOS GENERALES'],
            ['nombre' => 'TECNICO']
        ]);
    }
}
