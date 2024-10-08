<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgenciaShowResource extends JsonResource
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
            'ugl_id' => $this->resource->ugl_id,
            'ugl' => $this->resource->ugl ? $this->resource->ugl->nombre : null,
            'domicilio_trabajo' => $this->resource->domicilio_trabajo,
            'telefono_laboral' => $this->resource->telefono_laboral,
        ];
    }
}
