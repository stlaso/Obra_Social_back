<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UGLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_ugl')->insert([
            ['nombre' => 'NIVEL CENTRAL'],
            ['nombre' => 'TUCUMAN'],
            ['nombre' => 'CORRIENTES'],
            ['nombre' => 'CORDOBA'],
            ['nombre' => 'MENDOZA'],
            ['nombre' => 'BAHIA BLANCA'],
            ['nombre' => 'CAPITAL FEDERAL'],
            ['nombre' => 'LA PLATA'],
            ['nombre' => 'SAN MARTIN'],
            ['nombre' => 'ROSARIO'],
            [ 'nombre' => 'LANUS'],
            [ 'nombre' => 'MAR DEL PLATA'],
            [ 'nombre' => 'SALTA'],
            [ 'nombre' => 'CHACO'],
            [ 'nombre' => 'ENTRE RIOS'],
            [ 'nombre' => 'SANTA FE'],
            [ 'nombre' => 'NEUQUEN'],
            [ 'nombre' => 'CHUBUT'],
            [ 'nombre' => 'MISIONES'],
            [ 'nombre' => 'SANTIAGO DEL ESTERO'],
            [ 'nombre' => 'LA PAMPA'],
            [ 'nombre' => 'SAN JUAN'],
            [ 'nombre' => 'JUJUY'],
            [ 'nombre' => 'FORMOSA'],
            [ 'nombre' => 'CATAMARCA'],
            [ 'nombre' => 'LA RIOJA'],
            [ 'nombre' => 'SAN LUIS'],
            [ 'nombre' => 'RIO NEGRO'],
            [ 'nombre' => 'SANTA CRUZ'],
            [ 'nombre' => 'MORON'],
            [ 'nombre' => 'AZUL'],
            [ 'nombre' => 'JUNIN'],
            [ 'nombre' => 'LUJAN'],
            [ 'nombre' => 'TIERRA DEL FUEGO'],
            [ 'nombre' => 'CONCORDIA'],
            [ 'nombre' => 'SAN JUSTO'],
            [ 'nombre' => 'RIO CUARTO'],
            [ 'nombre' => 'QUILMES'],
            [ 'nombre' => 'CHIVILCOY'],
            [ 'nombre' => 'PATAGONIA NORTE'],
            [ 'nombre' => 'INSSJP - AMBITO NACIONAL'],
        ]);
    }
}
