<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NacionalidadSeeder::class,
            SexoSeeder::class,
            AgrupamientoSeeder::class,
            EstadoCivilSeeder::class,
            ParentescoSeeder::class,
            TipoContratoSeeder::class,
            TipoDocumentoSeeder::class,
            TipoSubsidioSeeder::class,
            TramoSeeder::class,
            EstadosSeeder::class,
            RolesSeeder::class,
            SeccionalSeeder::class,
            UGLSeeder::class,
            ProvinciaSeeder::class,

        ]);
    }
}
