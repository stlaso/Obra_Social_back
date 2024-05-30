<?php

namespace App\Services;
use App\Models\Agencia;

class AgenciaService
{
    public function AgenciaLista($ugl_id)
    {
        $Agencia = Agencia::where('ugl_id', $ugl_id)->get();
        return $Agencia;
    }
}