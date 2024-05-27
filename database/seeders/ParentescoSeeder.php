<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parentesco')->insert([ 
            ['nombre' => 'ABUELO'],
            ['nombre' => 'AHIJADO'],
            ['nombre' => 'CONCUBINO'],
            ['nombre' => 'CONYUGE'],
            ['nombre' => 'HERMANO'],
            ['nombre' => 'HIJO'],
            ['nombre' => 'MADRE'],
            ['nombre' => 'NIETO'],
            ['nombre' => 'PADRE'],
            ['nombre' => 'SOBRINO']
        ]);
    }
}
