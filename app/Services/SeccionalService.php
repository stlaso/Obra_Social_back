<?php

namespace App\Services;

use App\Models\Seccional;

class SeccionalService
{
    public function SeccionalLista()
    {
        $Seccional = Seccional::orderBy('nombre', 'asc')->paginate(10);
        return $Seccional;
    }

    public function seccionalAll()
    {
        $seccional=Seccional::orderBy('nombre', 'asc')->get();
        return $seccional;
    }

    public function crearSeccional($data)
    {
        $seccional = Seccional::create([
            'nombre' => $data['nombre'],
        ]);

        return $seccional;
    }

    public function actualizarSeccional($id, $data)
    {
        $seccional = Seccional::find($id);

        if (!$seccional) {
            return null;
        }

        $seccional->nombre = $data['nombre'] ?? $seccional->nombre;

        $seccional->save();

        return $seccional;
    }

    public function eliminarSeccional($id)
    {
        $seccional = Seccional::find($id);

        if (!$seccional) {
            return null;
        }

        $seccional->delete();

        return $seccional;
    }

    public function buscarSeccional($query)
    {
        $seccionales = Seccional::where('nombre', 'LIKE', "%$query%")
            ->get();
    
        return $seccionales;
    }
}
