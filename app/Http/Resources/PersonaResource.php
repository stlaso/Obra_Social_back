<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'nombre'=>$this->resource->nombre,
            'apellido'=>$this->resource->apellido,
            'cuil'=>$this->resource->cuil,
            'email'=>$this->resource->email,
            'ugl'=>$this->resource->datosLaborales->agencias->ugl->nombre ?? null,
            'seccional'=>$this->resource->datosLaborales->seccionales->nombre ?? null,
            'estado'=>$this->resource->estados->nombre,
        ];
    }
}
