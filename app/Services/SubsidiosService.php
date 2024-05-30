<?php

namespace App\Services;
use App\Models\Subsidios;

class SubsidiosService
{
    public function SubsidiosLista()
    {
        $Subsidios = Subsidios::all();
        return $Subsidios;
    }
}
