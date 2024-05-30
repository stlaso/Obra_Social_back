<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubsidiosService;
use App\Http\Resources\SubsidioResource;

class SubsidioController extends Controller
{
    public function __construct(SubsidiosService $SubsidiosService)
    {
        $this->SubsidiosService = $SubsidiosService;
    }

    public function index()
    {
        $Subsidios=$this->SubsidiosService->SubsidiosLista();
        return SubsidioResource::collection($Subsidios);
    }
}


