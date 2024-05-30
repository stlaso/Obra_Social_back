<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AgrupamientoService;
use App\Http\Resources\AgrupamientoResource;

class AgrupamientoController extends Controller
{
    protected $agrupamientoService;

    public function __construct(AgrupamientoService $agrupamientoService)
    {
        $this->agrupamientoService = $agrupamientoService;
    }

    public function index()
    {
        $agrupamiento=$this->agrupamientoService->agrupamientoLista();
        return AgrupamientoResource::collection($agrupamiento);
    }
    
}
