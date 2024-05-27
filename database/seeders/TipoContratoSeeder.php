<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_contrato')->insert([ 
            ['nombre' => 'PLANTA PERMANENTE'],
            ['nombre' => 'CONTRATO'],

        ]);
    }
}
