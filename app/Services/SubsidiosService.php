<?php

namespace App\Services;
use App\Models\TipoSubsidio;

class SubsidiosService
{
    public function SubsidiosLista()
    {
        $Subsidios = TipoSubsidio::all();
        return $Subsidios;
    }
}
