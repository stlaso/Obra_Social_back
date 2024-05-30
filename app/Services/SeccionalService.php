<?php

namespace App\Services;
use App\Models\Seccional;

class SeccionalService
{
    public function SeccionalLista()
    {
        $Seccional=Seccional::orderBy('nombre', 'asc')->get();
        return $Seccional;
    }
}