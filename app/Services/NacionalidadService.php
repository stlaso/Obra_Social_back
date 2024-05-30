<?php

namespace App\Services;
use App\Models\Nacionalidad;

class NacionalidadService
{
    public function nacionalidadLista()
    {
        $nacionalidad = Nacionalidad::all();
        return $nacionalidad;
    }
}
