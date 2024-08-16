<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomizeException;
use Illuminate\Http\Request;
use App\Services\LocalidadService;
use App\Http\Resources\LocalidadResource;
use Illuminate\Http\Response;


class LocalidadController extends Controller
{
    protected $localidadService;

    public function __construct(LocalidadService $localidadService)
    {
        $this->localidadService = $localidadService;
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);

        $localidades = $this->localidadService->localidadLista($perPage);

        return LocalidadResource::collection($localidades);
    }

    public function show($provinciaId)
    {
        $localidades = $this->localidadService->buscarLocalidadesPorProvincia($provinciaId);
        return LocalidadResource::collection($localidades);
    }    

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'provincia_id' => 'required|integer|exists:provincia,id',
        ]);

        $localidad = $this->localidadService->crearLocalidad($data);
        return new LocalidadResource($localidad);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'provincia_id' => 'sometimes|integer|exists:provincia,id',
        ]);

        $localidad = $this->localidadService->actualizarLocalidad($id, $data);
        return new LocalidadResource($localidad);
    }
    
    public function buscarLocalidad(Request $request)
    {
        try {
            $query = $request->input('query');
            $localidades = $this->localidadService->buscarLocalidad($query);
    
            return LocalidadResource::collection($localidades);
        } catch (\Exception $e) {
            throw new CustomizeException('Localidad no encontrada', Response::HTTP_NOT_FOUND);
        }
    }

    public function obtenerPorProvincia($provincia_id)
    {
        $localidades = $this->localidadService->buscarLocalidadesPorProvincia($provincia_id);
        return LocalidadResource::collection($localidades);
    }
    
    public function LocalidadAll()
    {
        $localidad = $this->localidadService->LocalidadAll();
        return LocalidadResource::collection($localidad);
    }

    public function destroy($id)
    {
        $this->localidadService->eliminarLocalidad($id);
        return response()->json(null, 204);
    }
}
