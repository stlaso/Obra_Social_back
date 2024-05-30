<?php

namespace App\Services;
use App\Models\Localidad;

class localidadService
{
    public function localidadLista($provinciaId)
    {
        $localidades = Localidad::where('provincia_id', $provinciaId)->get();
        return $localidades;
    }
}