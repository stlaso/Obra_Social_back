<?php

namespace App\Services;
use App\Models\Provincia;

class ProvinciaService
{
    public function provinciaLista()
    {
        $provincia=Provincia::orderBy('nombre', 'asc')->get();
        return $provincia;
    }
}