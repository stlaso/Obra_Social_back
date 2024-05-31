<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FamiliaService;
use App\Http\Resources\FamiliaResource;

class FamiliaController extends Controller
{
    protected $FamiliaService;

    public function __construct(FamiliaService $FamiliaService)
    {
        $this->FamiliaService = $FamiliaService;
    }

    public function index()
    {
        $Familia=$this->FamiliaService->FamiliaLista();
        return FamiliaResource::collection($Familia);
    }
}
