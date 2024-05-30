<?php

namespace App\Services;
use App\Models\EstadoCivil;

class EstadoCivilService
{
    public function EstadoCivilLista()
    {
        $EstadoCivil = EstadoCivil::all();
        return $EstadoCivil;
    }
}
