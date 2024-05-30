<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estado_civil')->insert([
            ['nombre' => 'CASADO'],
            ['nombre' => 'CONCUBINO'],
            ['nombre' => 'DIVORCIADO'],
            ['nombre' => 'SOLTERO'],
            ['nombre' => 'VIUDO'],

        ]);
    }
}
