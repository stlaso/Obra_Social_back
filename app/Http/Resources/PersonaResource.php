<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'nombre'=>$this->resource->nombre,
            'apellido'=>$this->resource->apellido,
            'legajo'=>$this->resource->legajo,
            'dni'=>$this->resource->dni,
            'email'=>$this->resource->email,
            'ugl'=>$this->resource->datosLaborales->agencias->ugl->nombre ?? null,
            'seccional'=>$this->resource->datosLaborales->seccionales->nombre ?? null,
            'seccional_id'=>$this->resource->datosLaborales->seccionales->id ?? null,
            'estado'=>$this->resource->estados->nombre,
        ];
    }
}
