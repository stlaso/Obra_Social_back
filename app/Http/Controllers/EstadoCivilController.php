<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EstadoCivilService;
use App\Http\Resources\EstadoCivilResource;

class EstadoCivilController extends Controller
{
    protected $EstadoCivilService;

    public function __construct(EstadoCivilService $EstadoCivilService)
    {
        $this->EstadoCivilService = $EstadoCivilService;
    }

    public function index()
    {
        $EstadoCivil=$this->EstadoCivilService->EstadoCivilLista();
        return EstadoCivilResource::collection($EstadoCivil);
    }
}
