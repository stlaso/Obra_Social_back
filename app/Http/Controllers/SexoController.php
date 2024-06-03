<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SexoService;
use App\Http\Resources\SexoResource;

class SexoController extends Controller
{
    protected $SexoService;

    public function __construct(SexoService $SexoService)
    {
        $this->SexoService = $SexoService;
    }

    public function index()
    {
        $Sexo=$this->SexoService->SexoLista();
        return SexoResource::collection($Sexo);
    }
}
