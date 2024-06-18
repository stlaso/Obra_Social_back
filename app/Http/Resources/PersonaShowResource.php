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
                    'id' => $this->id,
                    'legajo' => $this->legajo,
                    'fecha_afiliacion' => $this->fecha_afiliacion ?? null,
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'sexo_id' => $this->sexo_id ?? null,
                    'sexo'=>$this->sexo->nombre ?? null,
                    'fecha_nacimiento' => $this->fecha_nacimiento ?? null,
                    'estado_civil_id' => $this->estado_civil_id ?? null,
                    'estado_civil' => $this->estadoCivil->nombre ?? null,
                    'tipo_documento' => $this->tipo_documento ?? null,
                    'dni' => $this->dni,
                    'cuil' => $this->cuil ?? null,
                    'email' => $this->email,
                    'telefono' => $this->telefono ?? null,
                    'nacionalidad_id' => $this->nacionalidad_id ?? null,
                    'nacionalidad' => $this->nacionalidades->nombre ?? null,
                    'estados_id' => $this->estados_id ?? null,
                    'estados' => $this->estados->nombre ?? null,
                    'users_id'=>$this->users_id ?? null,
                    'user_nombre'=>$this->users->nombre ?? null,
                ],
                'domicilios' => $this->when($this->domicilios, function () {
                    return [
                        'id' => $this->id,
                        'domicilio' => $this->domicilios->domicilio ?? null,
                        'provincia_id' => $this->domicilios->provincia_id ?? null,
                        'provincia' => $this->domicilios->provincias->nombre ?? null,
                        'localidad_id' => $this->domicilios->localidad_id ?? null,
                        'localidad' => $this->domicilios->localidades->nombre ?? null,
                        'codigo_postal' => $this->domicilios->codigo_postal ?? null,
                    ];
                }),
                'datos_laborales' => $this->when($this->datosLaborales, function () {
                    return [
                        'id' => $this->id,
                        'carga_horaria' => $this->datosLaborales->carga_horaria ?? null,
                        'fecha_ingreso' => $this->datosLaborales->fecha_ingreso ?? null,
                        'email_laboral' => $this->datosLaborales->email_laboral ?? null,
                        'tramo_id' => $this->datosLaborales->tramo_id ?? null,
                        'tramo' => $this->datosLaborales->tramo->nombre ?? null,
                        'horas' => $this->datosLaborales->tramo->horas ?? null,
                        'ugl_id' => $this->datosLaborales->agencias->ugl_id ?? null,
                        'ugl' => $this->datosLaborales->agencias->ugl->nombre?? null,
                        'domicilio' => $this->datosLaborales->agencias->domicilio_trabajo ?? null,
                        'telefono_laboral' => $this->datosLaborales->agencias->telefono_laboral ?? null,
                        'agrupamiento_id' => $this->datosLaborales->agrupamiento_id ?? null,
                        'agrupamiento' => $this->datosLaborales->agrupamiento->nombre ?? null,
                        'seccional_id' => $this->datosLaborales->seccional_id ?? null,
                        'seccional' => $this->datosLaborales->seccionales->nombre ?? null,
                        'agencia_id' => $this->datosLaborales->agencia_id ?? null,
                        'agencia' => $this->datosLaborales->agencias->nombre ?? null,

                        'tipo_contrato_id' => $this->datosLaborales->tipo_contrato_id ?? null,
                    ];
                }),
                'obraSociales' => $this->when($this->obraSociales, function () {
                    return [
                        'id' => $this->id,
                        'tipo_obra' => $this->obraSociales->tipo_obra ?? null,
                        'obra_social' => $this->obraSociales->obra_social ?? null,
                    ];
                }),
                'familiares' => $this->when($this->familiares, function () {
                    return $this->familiares->map(function ($familiar) {
                        return [
                            'id' => $this->id,
                            'created_at' => $familiar->created_at ?? null,
                            'nombre_familiar' => $familiar->nombre_familiar ?? null,
                            'fecha_nacimiento_familiar' => $familiar->fecha_nacimiento_familiar ?? null,
                            'tipo_documento_familiar' => $familiar->tipo_documento_familiar ?? null,
                            'documento' => $familiar->documento ?? null,
                            'parentesco_id' => $familiar->parentesco_id ?? null,
                            'parentesco' => $familiar->parentesco->nombre ?? null,
                            'updated_at' => $familiar->updated_at ?? null,
                            'users_id' => $familiar->users_id ?? null,
                            'users_nombre' => $familiar->users->nombre ?? null
                        ];
                    });
                }),
                'documentaciones' => $this->when($this->documentaciones, function () {
                    return $this->documentaciones->map(function ($doc) {
                        return [
                            'id' => $this->id,
                            'created_at' => $doc->created_at ?? null,
                            'tipo_documento_id' => $doc->tipo_documento_id ?? null,
                            'tipo_documento' => $doc->tipoDocumento->nombre ?? null,
                            'archivo' => $doc->archivo ?? null,
                            'updated_at' => $doc->updated_at ?? null,
                            'users_id' => $doc->users_id ?? null,
                            'users_nombre' => $doc->users->nombre ?? null
                        ];
                    });
                }),
                'subsidios' => $this->when($this->subsidios, function () {
                    return $this->subsidios->map(function ($sub) {
                        return [
                            'id' => $this->id,
                            'created_at' => $sub->created_at ?? null,
                            'tipo_subsidio_id' => $sub->tipo_subsidio_id ?? null,
                            'tipo_subsidio' => $sub->tipoSubsidio->nombre ?? null,
                            'fecha_solicitud' => $sub->fecha_solicitud ?? null,
                            'fecha_otorgamiento' => $sub->fecha_otorgamiento ?? null,
                            'observaciones' => $sub->observaciones ?? null,
                            'updated_at' => $sub->updated_at ?? null,
                            'users_id' => $sub->users_id ?? null,
                            'users_nombre' => $sub->users->nombre ?? null,
                        ];
                    });
                }),
            ];

    }
}
