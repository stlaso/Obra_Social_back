<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TramoService;
use App\Http\Resources\TramoResource;

class TramoController extends Controller
{
    protected $TramoService;

    public function __construct(TramoService $TramoService)
    {
        $this->TramoService = $TramoService;
    }

    public function index()
    {
        $Tramo=$this->TramoService->TramoLista();
        return TramoResource::collection($Tramo);
    }
}
