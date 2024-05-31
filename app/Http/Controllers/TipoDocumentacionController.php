<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TipoDocumentacionService;
use App\Http\Resources\TipoDoumentacionResource;

class TipoDocumentacionController extends Controller
{
    public function __construct(TipoDocumentacionService $TipoDocumentacionService)
    {
        $this->TipoDocumentacionService = $TipoDocumentacionService;
    }

    public function index()
    {
        $TipoDocumentacion=$this->TipoDocumentacionService->DocumentacionLista();
        return TipoDoumentacionResource::collection($TipoDocumentacion);
    }
}
