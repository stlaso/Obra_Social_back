<?php

namespace App\Services;

use App\Models\Agencia;
use GuzzleHttp\Psr7\Request;

class AgenciaService
{
    public function AgenciaLista($ugl_id = null, $perPage = 20)
    {
        $query = Agencia::query();
        
        if ($ugl_id) {
            return $query->where('ugl_id', $ugl_id)->get();
        }
    
        return $query->paginate($perPage);
    }

    public function AgenciaAll()
    {
        return Agencia::where('nombre')->get();
    }

    public function verAgencia($id)
    {
        return Agencia::findOrFail($id);
    }

    public function index(Request $request)
    {
        $agencia = Agencia::paginate(10);
        return response()->json($agencia);
    }

    public function AgenciaDatos($id)
    {
        return Agencia::findOrFail($id);
    }

    public function crearAgencia($data)
    {
        return Agencia::create($data);
    }

    public function actualizarAgencia($id, $data)
    {
        $agencia = Agencia::findOrFail($id);
        $agencia->update($data);
        return $agencia;
    }

    public function eliminarAgencia($id)
    {
        $agencia = Agencia::findOrFail($id);
        $agencia->delete();
    }

public function buscarAgencia($query)
{
    $agencia = Agencia::where('nombre', 'LIKE', "%$query%")
        ->orWhere('ugl_id', 'LIKE', "%$query%")
        ->orWhere('domicilio_trabajo', 'LIKE', "%$query%")
        ->orWhere('telefono_laboral', 'LIKE', "%$query%")
        ->get();

    return $agencia;
}
}
