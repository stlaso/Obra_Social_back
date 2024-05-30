<?php

namespace App\Services;
use App\Models\Agrupamiento;

class AgrupamientoService
{
    public function agrupamientoLista()
    {
        $agrupamiento = Agrupamiento::all();
        return $agrupamiento;
    }
}