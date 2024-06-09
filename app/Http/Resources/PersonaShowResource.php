<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
                'persona' => [
                    'legajo' => $this->legajo,
                    'fecha_afiliacion' => $this->fecha_afiliacion ?? null,
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'sexo_id' => $this->sexo_id ?? null, // 'sexo' => $this->sexo ? $this->sexo->nombre : null, (Algo como esto seria)
                    'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
                    'estado_civil_id' => $this->estado_civil_id ?? null,
                    'tipo_documento' => $this->tipo_documento ?? null,
                    'dni' => $this->dni,
                    'cuil' => $this->cuil ?? null,
                    'email' => $this->email,
                    'telefono' => $this->telefono ?? null,
                    'nacionalidad_id' => $this->nacionalidad_id ?? null,
                    'estados_id' => $this->estados_id ?? null,
                    'user_id'=>$this->user_id ?? null,
                ],
                'domicilios' => $this->when($this->domicilios, function () {
                    return [
                        'domicilio' => $this->domicilios->domicilio ?? null,
                        'provincia_id' => $this->domicilios->provincia_id ?? null,
                        'localidad_id' => $this->domicilios->localidad_id ?? null,
                        'codigo_postal' => $this->domicilios->codigo_postal ?? null,
                    ];
                }),
                'datos_laborales' => $this->when($this->datosLaborales, function () {
                    return [
                        'carga_horaria' => $this->datosLaborales->carga_horaria ?? null,
                        'fecha_ingreso' => $this->datosLaborales->fecha_ingreso ?? null,
                        'email_laboral' => $this->datosLaborales->email_laboral ?? null,
                        'tramo_id' => $this->datosLaborales->tramo_id ?? null,
                        // Agregar ugl_id
                        // agregar domicilio_trabajo
                        // Agregar telefono_laboral
                        'agrupamiento_id' => $this->datosLaborales->agrupamiento_id ?? null,
                        'seccional_id' => $this->datosLaborales->seccional_id ?? null,
                        'agencia_id' => $this->datosLaborales->agencia_id ?? null,
                        'tipo_contrato_id' => $this->datosLaborales->tipo_contrato_id ?? null,
                    ];
                }),
                'obraSociales' => $this->when($this->obraSociales, function () {
                    return [
                        'tipo_obra' => $this->obraSociales->tipo_obra ?? null,
                        'obra_social' => $this->obraSociales->obra_social ?? null,
                    ];
                }),
                'familiares' => $this->when($this->familiares, function () {
                    return $this->familiares->map(function ($familiar) {
                        return [
                            'nombre_familiar' => $familiar->nombre_familiar ?? null,
                            'fecha_nacimiento_familiar' => $familiar->fecha_nacimiento_familiar ?? null,
                            'tipo_documento_familiar' => $familiar->tipo_documento_familiar ?? null,
                            'documento' => $familiar->documento ?? null,
                            'parentesco_id' => $familiar->parentesco_id ?? null,
                        ];
                    });
                }),
                'documentaciones' => $this->when($this->documentaciones, function () {
                    return $this->documentaciones->map(function ($doc) {
                        return [
                            'tipo_documento_id' => $doc->tipo_documento_id ?? null,
                            'archivo' => $doc->archivo ?? null,
                        ];
                    });
                }),
                'subsidios' => $this->when($this->subsidios, function () {
                    return $this->subsidios->map(function ($sub) {
                        return [
                            'tipo_subsidio_id' => $sub->tipo_subsidio_id ?? null,
                            'fecha_solicitud' => $sub->fecha_solicitud ?? null,
                            'fecha_otorgamiento' => $sub->fecha_otorgamiento ?? null,
                            'observaciones' => $sub->observaciones ?? null,
                            'user_id' => $sub->user_id ?? null,
                        ];
                    });
                }),
            ];

    }
}
