<?php

namespace App\Services;

use App\Models\Persona;

class PersonaService
{
    public function personaLista()
    {
        $persona=Persona::orderBy('apellido', 'asc')->paginate(10);
        return $persona;
    }

    public function personaCrear($data)
    {
        $persona=Persona::create($data);


    return $persona;
    }
}