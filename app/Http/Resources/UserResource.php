<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->resource->id,
            'nombre' => $this->resource->nombre,
            'apellido'=>$this->resource->apellido,
            'correo' => $this->resource->correo,
            'seccional'=>$this->resource->seccional->nombre,
            'seccional_id'=>(int) $this->resource->seccional_id,
            'rol'=>$this->resource->rol->nombre,
            'roles_id'=>(int) $this->resource->roles_id,
            'estado'=>$this->resource->estado->nombre,
            'creada'=>$this->resource->created_at,
            'telefono'=>$this->resource->telefono,
            'user'=>$this->resource->username
        ];
    }
}
