<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubsidiosService;
use App\Http\Resources\SubsidiosResource;

class Subsidios extends Controller
{
    protected $SubsidiosService;

    public function __construct(SubsidiosService $SubsidiosService)
    {
        $this->SubsidiosService = $SubsidiosService;
    }

    public function index()
    {
        $Subsidios=$this->SubsidiosService->SubsidiosLista();
        return SubsidiosResource::collection($Subsidios);
    }
}
