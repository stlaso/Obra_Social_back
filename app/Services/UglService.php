<?php

namespace App\Services;
use App\Models\Ugl;

class UglService
{
    public function UglLista()
    {
        $Ugl=Ugl::orderBy('nombre', 'asc')->get();
        return $Ugl;
    }
}