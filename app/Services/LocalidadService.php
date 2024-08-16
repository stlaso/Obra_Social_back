<?php

namespace App\Services;

use App\Models\Localidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LocalidadService
{
    public function localidadLista($perPage = 15)
    {
        return Localidad::with('provincia')->paginate($perPage);
    }

    public function LocalidadAll()
    {
        return Localidad::with('provincia')->get();
    }

    public function buscarLocalidadesPorProvincia($provinciaId)
    {
        return Localidad::where('provincia_id', $provinciaId)->get();
    }

    public function verLocalidad($id)
    {
        return Localidad::with('provincia')->findOrFail($id);
    }

    public function crearLocalidad(array $data)
    {
        return Localidad::create($data);
    }

    public function actualizarLocalidad($id, array $data)
    {
        $localidad = Localidad::findOrFail($id);
        $localidad->update($data);
        return $localidad;
    }

    public function eliminarLocalidad($id)
    {
        $localidad = Localidad::findOrFail($id);
        $localidad->delete();
    }

    public function buscarLocalidad($query)
    {
        $localidades = Localidad::where('nombre', 'LIKE', "%$query%")
            ->get();
    
        return $localidades;
    }
}
