<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RolesService;
use App\Http\Resources\RolesResource;

class RolesController extends Controller
{
    protected $RolesService;

    public function __construct(RolesService $RolesService)
    {
        $this->RolesService = $RolesService;
    }

    public function index()
    {
        $Roles=$this->RolesService->RolesLista();
        return RolesResource::collection($Roles);
    }
}
