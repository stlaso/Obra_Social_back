<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SeccionalService;
use App\Http\Resources\SeccionalResource;
use App\Http\Requests\SeccionalRequest;
use App\Exceptions\CustomizeException;
use Illuminate\Http\Response;

class SeccionalController extends Controller
{
    protected $seccionalService;

    public function __construct(SeccionalService $seccionalService)
    {
        $this->seccionalService = $seccionalService;
    }

    public function index()
    {
        $seccional = $this->seccionalService->seccionalLista();
        return SeccionalResource::collection($seccional);
    }

    public function store(SeccionalRequest $request)
    {
        try {
            $validated = $request->validated();
            $seccional = $this->seccionalService->crearSeccional($validated);

            return response()->json([
                'message' => 'Seccional creado exitosamente',
                'data' => new SeccionalResource($seccional),
            ], 201);

        } catch (\Exception $e) {
            throw new CustomizeException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }

    public function update(SeccionalRequest $request, $seccionalId)
    {
        try {
            $validated = $request->validated();
            $seccional = $this->seccionalService->actualizarSeccional($seccionalId, $validated);

            if (!$seccional) {
                return response()->json([
                    'message' => 'Seccional no encontrado',
                ], 404);
            }

            return response()->json([
                'message' => 'Seccional actualizado exitosamente',
                'data' => new SeccionalResource($seccional),
            ], 200);

        } catch (\Exception $e) {
            throw new CustomizeException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }

    public function show($id)
    {
        $seccional = $this->seccionalService->eliminarSeccional($id);
        return new SeccionalResource($seccional);
    }

    public function buscarSeccional(Request $request)
    {
        try {
            $query = $request->input('query');
            $seccionales = $this->seccionalService->buscarSeccional($query);
    
            return SeccionalResource::collection($seccionales);
        } catch (\Exception $e) {
            throw new CustomizeException('Seccional no encontrada', Response::HTTP_NOT_FOUND);
        }
    }    

    public function destroy($id)
    {
        try {
            $seccional = $this->seccionalService->eliminarSeccional($id);

            if (!$seccional) {
                return response()->json([
                    'message' => 'Seccional no encontrada',
                ], 404);
            }

            return response()->json([
                'message' => 'Seccional eliminado exitosamente',
            ], 200);

        } catch (\Exception $e) {
            throw new CustomizeException('No se pudo eliminar el seccional', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
