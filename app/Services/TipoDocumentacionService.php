<?php

namespace App\Services;
use App\Models\TipoDocumento;

class TipoDocumentacionService
{
    public function DocumentacionLista()
    {
        $Documentacion = TipoDocumento::all();
        return $Documentacion;
    }
}
