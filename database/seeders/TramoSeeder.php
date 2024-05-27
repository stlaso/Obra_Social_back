<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TramoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tramo')->insert([
            ['nombre' => 'A', 'horas' => 45],
            ['nombre' => 'B', 'horas' => 40],
            ['nombre' => 'C', 'horas' => 35],
            ['nombre' => 'D', 'horas' => 35]
        ]);
    }
}
