<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SeccionalService;
use App\Http\Resources\SeccionalResource;

class SeccionalController extends Controller
{
    protected $seccionalService;

    public function __construct(SeccionalService $seccionalService)
    {
        $this->seccionalService = $seccionalService;
    }

    public function index()
    {
        $seccional=$this->seccionalService->seccionalLista();
        return SeccionalResource::collection($seccional);
    }
}
