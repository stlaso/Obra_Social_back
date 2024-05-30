<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AgenciaService;
use App\Http\Resources\AgenciaResource;

class AgenciaController extends Controller
{
    protected $AgenciaService;

    public function __construct(AgenciaService $AgenciaService)
    {
        $this->AgenciaService = $AgenciaService;
    }

    public function show($id)
    {
        $Agencia=$this->AgenciaService->AgenciaLista($id);
        return AgenciaResource::collection($Agencia);
    }
}
