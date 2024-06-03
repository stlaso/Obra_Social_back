<?php

namespace App\Services;
use App\Models\Tramo;

class TramoService
{
    public function TramoLista()
    {
        $Tramo=Tramo::all();
        return $Tramo;
    }
}
