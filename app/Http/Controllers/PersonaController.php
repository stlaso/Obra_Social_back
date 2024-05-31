<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PersonaResource;
use App\Http\Resources\PersonaShowResource;
use App\Services\PersonaService;
use App\Http\Requests\PersonaRequest;
use App\Http\Requests\PersonaEditRequest;
use App\Exceptions\CustomizeException;



class PersonaController extends Controller
{

    protected $personaService;

    public function __construct(PersonaService $personaService)
    {
        $this->personaService = $personaService;
    }

    public function index()
    {
        $persona=$this->personaService->personaLista();
        return PersonaResource::collection($persona);
    }

    public function store(PersonaRequest $request)
    {
        try {
            $validated = $request->validated();
            $persona = $this->personaService->personaCrear($validated);
            return response()->json([
                "message" => "Persona creada exitosamente",
            ], 200);
        } catch (\Exception $e) {
            throw new CustomizeException($e->getMessage(), \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }

    public function update(PersonaEditRequest $request, $personaId)
    {
        try {

            $validated = $request->validated();
            $persona = $this->personaService->personaActualizar($personaId, $validated);

            if (!$persona) {
                return response()->json([
                    "message" => "Persona no encontrada",
                ], 404);
            }

            return response()->json([
                "message" => "Persona actualizada exitosamente",
            ], 200);

        } catch (\Exception $e) {
            throw new CustomizeException($e->getMessage(), \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }


    public function show($id)
    {
        $persona=$this->personaService->verPersona($id);
        return new PersonaShowResource($persona);
    }

    public function destroy(string $id)
    {
        try {
            $persona = $this->personaService->eliminarPersona($id);

            return response()->json([
                "message" => "Persona eliminada correctamente",
            ], 200);
        } catch (\Exception $e) {
            throw new CustomizeException('No se pudo eliminar la prioridad', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}

