<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocalidadService;
use App\Http\Resources\LocalidadResource;

class LocalidadController extends Controller
{
    protected $localidadService;

    public function __construct(LocalidadService $localidadService)
    {
        $this->localidadService = $localidadService;
    }

    public function show($id)
    {
        $localidad=$this->localidadService->localidadLista($id);
        return LocalidadResource::collection($localidad);
    }
}
