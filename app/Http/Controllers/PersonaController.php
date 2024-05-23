<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PersonaResource;
use App\Services\PersonaService;
use App\Http\Requests\PersonaRequest;
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
}

