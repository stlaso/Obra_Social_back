<?php

namespace App\Services;
use App\Models\Parentesco;

class FamiliaService
{
    public function FamiliaLista()
    {
        $Familia = Parentesco::all();
        return $Familia;
    }
}
