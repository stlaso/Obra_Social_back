<?php

namespace App\Services;
use App\Models\Sexo;

class SexoService
{
    public function SexoLista()
    {
        $Sexo=Sexo::all();
        return $Sexo;
    }
}
