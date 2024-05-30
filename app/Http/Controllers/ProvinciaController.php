<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProvinciaService;
use App\Http\Resources\ProvinciaResource;


class ProvinciaController extends Controller
{
    protected $provinciaService;

    public function __construct(ProvinciaService $provinciaService)
    {
        $this->provinciaService = $provinciaService;
    }

    public function index()
    {
        $provincia=$this->provinciaService->provinciaLista();
        return ProvinciaResource::collection($provincia);
    }
    
}
