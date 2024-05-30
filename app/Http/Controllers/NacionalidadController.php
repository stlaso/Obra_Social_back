<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NacionalidadService;
use App\Http\Resources\NacionalidadResource;

class NacionalidadController extends Controller
{
    protected $nacionalidadService;

    public function __construct(NacionalidadService $nacionalidadService)
    {
        $this->nacionalidadService = $nacionalidadService;
    }

    public function index()
    {
        $nacionalidad=$this->nacionalidadService->nacionalidadLista();
        return NacionalidadResource::collection($nacionalidad);
    }
}
