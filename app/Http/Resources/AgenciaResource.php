<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgenciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'ugl_id' => $this->resource->ugl_id,
            'ugl' => $this->ugl ? $this->ugl->nombre : null,
            'domicilio_trabajo' => $this->domicilio_trabajo,
            'telefono_laboral' => $this->telefono_laboral,
        ];
    }
}

