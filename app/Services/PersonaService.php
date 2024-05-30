<?php

namespace App\Services;

use App\Models\Persona;
use App\Models\Domicilio;
use App\Models\DatosLaborales;
use App\Models\obraSocial;
use App\Models\Familiares;
use App\Models\Documentacion;
use App\Models\Subsidios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonaService
{
    public function personaLista()
    {
        $persona=Persona::orderBy('apellido', 'asc')->paginate(10);
        return $persona;
    }

    public function verPersona($id)
    {

        $persona = Persona::with([
            'domicilios',
            'datosLaborales',
            'obraSociales',
            'familiares',
            'documentaciones'
        ])->findOrFail($id);
        return   $persona;
    }

    public function personaCrear($data)
    {
        DB::beginTransaction();

        try {
            if (isset($data['domicilio']))
            {
                $domicilio = $this->crearDomicilio($data['domicilio']);
                $data['persona']['domicilio_id'] = $domicilio;
            }

            if (isset($data['datos_laborales']))
            {
                $datosLaborales = $this->crearDatosLaborales($data['datos_laborales']);
                $data['persona']['datos_laborales_id'] = $datosLaborales;
            }


            if (isset($data['obra_social']))
            {
                $obraSocial = $this->crearObraSocial($data['obra_social']);
                $data['persona']['obra_social_id'] = $obraSocial;
            }


            $persona = Persona::create($data['persona']);


            if (isset($data['familiares']))
            {
                $this->crearFamiliares($persona->id, $data['familiares']);
            }

            if (isset($data['subsidios']))
            {
                $this->crearSubsidios($persona->id, $data['subsidios']);
            }

            if (isset($data['documentacion']))
            {
                $this->crearDocumentacion($persona->id, $data['documentacion']);
            }


            DB::commit();

            return $persona;
        } catch (\Exception $e)
        {
            DB::rollback();
            Log::error('Error al crear persona: ' . $e->getMessage());
            throw $e;
        }
    }

    public function crearDomicilio($data)
    {
        $domicilio=Domicilio::create($data);
        return $domicilio->id;

    }

    public function crearDatosLaborales($data)
    {
        $DatosLaborales=DatosLaborales::create($data);
        return $DatosLaborales->id;
    }

    public function crearObraSocial($data)
    {
        $obraSocial=ObraSocial::create($data);
        return $obraSocial->id;
    }

    public function crearFamiliares($id,$data)
    {

        foreach($data as $familia)
        {
            $familia['persona_id']=$id;
            $familiares=Familiares::create($familia);
        }

    }

    public function crearSubsidios($id,$data)
    {

        foreach($data as $subsidio)
        {
            $subsidio['persona_id']=$id;
            $subsidios=Subsidios::create($subsidio);
        }

    }

    public function crearDocumentacion($id,$data)
    {

        foreach($data as $documentacion)
        {
            $documentacion['persona_id']=$id;
            $documentacion=documentacion::create($documentacion);
        }

    }

    public function personaActualizar($personaId, $data)
    {
        DB::beginTransaction();

        try {
            $persona = Persona::findOrFail($personaId);

            if (isset($data['domicilio'])) {
                if ($persona->domicilio) {
                    $persona->domicilio->update($data['domicilio']);
                } else {
                    $domicilio = $this->domicilio($data['domicilio']);
                    $persona->domicilio_id = $domicilio;
                }
            } else {
                if ($persona->domicilio) {
                    $persona->domicilio->delete();
                    $persona->domicilio_id = null;
                }
            }

            if (isset($data['datos_laborales'])) {
                if ($persona->datosLaborales) {
                    $persona->datosLaborales->update($data['datos_laborales']);
                } else {
                    $datosLaborales = $this->datosLaborales($data['datos_laborales']);
                    $persona->datos_laborales_id = $datosLaborales;
                }
            } else {
                if ($persona->datosLaborales) {
                    $persona->datosLaborales->delete();
                    $persona->datos_laborales_id = null;
                }
            }

            if (isset($data['obra_social'])) {
                if ($persona->obraSocial) {
                    $persona->obraSocial->update($data['obra_social']);
                } else {
                    $obraSocial = $this->obraSocial($data['obra_social']);
                    $persona->obra_social_id = $obraSocial;
                }
            } else {
                if ($persona->obraSocial) {
                    $persona->obraSocial->delete();
                    $persona->obra_social_id = null;
                }
            }

            $persona->update($data['persona']);

            if (isset($data['familiares'])) {
                $this->actualizarFamiliares($persona->id, $data['familiares']);
            } else {
                $this->eliminarFamiliares($persona->id);
            }

            // Actualizar subsidios
            if (isset($data['subsidios'])) {
                $this->actualizarSubsidios($persona->id, $data['subsidios']);
            } else {
                $this->eliminarSubsidios($persona->id);
            }

            // Actualizar documentacion
            if (isset($data['documentacion'])) {
                $this->documentacion($persona->id, $data['documentacion']);
            } else {
                $this->eliminarDocumentacion($persona->id);
            }

            DB::commit();

            return $persona;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error al actualizar persona: ' . $e->getMessage());
            throw $e;
        }
    }

    private function actualizarFamiliares($personaId, $data)
    {
        $existingFamiliares = Familiares::where('persona_id', $personaId)->get()->keyBy('id')->toArray();

        foreach ($data as $familia) {
            if (isset($familia['id'])) {
                if (isset($existingFamiliares[$familia['id']])) {
                    Familiares::where('id', $familia['id'])->update($familia);
                    unset($existingFamiliares[$familia['id']]);
                } else {
                    $familia['persona_id'] = $personaId;
                    Familiares::create($familia);
                }
            } else {
                $familia['persona_id'] = $personaId;
                Familiares::create($familia);
            }
        }

        foreach ($existingFamiliares as $familia) {
            Familiares::where('id', $familia['id'])->delete();
        }
    }

    private function actualizarSubsidios($personaId, $data)
    {
        $existingSubsidios = Subsidios::where('persona_id', $personaId)->get()->keyBy('id')->toArray();

        foreach ($data as $subsidio) {
            if (isset($subsidio['id'])) {
                if (isset($existingSubsidios[$subsidio['id']])) {
                    Subsidios::where('id', $subsidio['id'])->update($subsidio);
                    unset($existingSubsidios[$subsidio['id']]);
                } else {
                    $subsidio['persona_id'] = $personaId;
                    Subsidios::create($subsidio);
                }
            } else {
                $subsidio['persona_id'] = $personaId;
                Subsidios::create($subsidio);
            }
        }

        foreach ($existingSubsidios as $subsidio) {
            Subsidios::where('id', $subsidio['id'])->delete();
        }
    }

    private function actualizarDocumentacion($personaId, $data)
    {
        $existingDocumentacion = Documentacion::where('persona_id', $personaId)->get()->keyBy('id')->toArray();

        foreach ($data as $doc) {
            if (isset($doc['id'])) {
                if (isset($existingDocumentacion[$doc['id']])) {
                    Documentacion::where('id', $doc['id'])->update($doc);
                    unset($existingDocumentacion[$doc['id']]);
                } else {
                    $doc['persona_id'] = $personaId;
                    Documentacion::create($doc);
                }
            } else {
                $doc['persona_id'] = $personaId;
                Documentacion::create($doc);
            }
        }

        foreach ($existingDocumentacion as $doc) {
            Documentacion::where('id', $doc['id'])->delete();
        }
    }

    private function eliminarFamiliares($personaId)
    {
        Familiares::where('persona_id', $personaId)->delete();
    }

    private function eliminarSubsidios($personaId)
    {
        Subsidios::where('persona_id', $personaId)->delete();
    }

    private function eliminarDocumentacion($personaId)
    {
        Documentacion::where('persona_id', $personaId)->delete();
    }



}
