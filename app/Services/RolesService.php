<?php

namespace App\Services;
use App\Models\Roles;

class RolesService
{
    public function RolesLista()
    {
        $Roles=Roles::all();
        return $Roles;
    }
}
