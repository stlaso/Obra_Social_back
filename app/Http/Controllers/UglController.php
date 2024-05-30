<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UglService;
use App\Http\Resources\UglResource;

class UglController extends Controller
{
    protected $uglService;

    public function __construct(UglService $uglService)
    {
        $this->uglService = $uglService;
    }

    public function index()
    {
        $ugl=$this->uglService->uglLista();
        return UglResource::collection($ugl);
    }
}
