<?php

namespace App\Services;

use App\Models\Persona;
use App\Models\Domicilio;
use App\Models\DatosLaborales;
use App\Models\obraSocial;
use App\Models\Familiares;
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

    public function personaCrear($data)
    {
        DB::beginTransaction(); 
    
        try {
            if (isset($data['domicilio'])) 
            {
                $domicilio = $this->domicilio($data['domicilio']);
                $data['persona']['domicilio_id'] = $domicilio;
            }

            if (isset($data['datos_laborales'])) 
            {
                $datosLaborales = $this->datosLaborales($data['datos_laborales']);
                $data['persona']['datos_laborales_id'] = $datosLaborales; 
            }
    
          
            if (isset($data['obra_social'])) 
            {
                $obraSocial = $this->obraSocial($data['obra_social']);
                $data['persona']['obra_social_id'] = $obraSocial; 
            }
    
     
            $persona = Persona::create($data['persona']);

          
            if (isset($data['familiares'])) 
            {
                $this->familiares($persona->id, $data['familiares']);
            }
            if (isset($data['subsidios'])) 
            {
                $this->subsidios($persona->id, $data['subsidios']);
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

    public function domicilio($data)
    {
        $domicilio=Domicilio::create($data);
        return $domicilio->id;
        
    }

    public function datosLaborales($data)
    {
        $DatosLaborales=DatosLaborales::create($data);
        return $DatosLaborales->id;
    }

    public function obraSocial($data)
    {
        $obraSocial=ObraSocial::create($data);
        return $obraSocial->id;
    }

    public function familiares($id,$data)
    {
        
        foreach($data as $familia)
        {
            $familia['persona_id']=$id;
            $familiares=Familiares::create($familia);
        }

    }

    public function subsidios($id,$data)
    {
        
        foreach($data as $subsidio)
        {
            $subsidio['persona_id']=$id;
            $subsidios=Subsidios::create($subsidio);
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
            }

            if (isset($data['datos_laborales'])) {
                if ($persona->datosLaborales) {
                    $persona->datosLaborales->update($data['datos_laborales']);
                } else {
                    $datosLaborales = $this->datosLaborales($data['datos_laborales']);
                    $persona->datos_laborales_id = $datosLaborales;
                }
            }

            if (isset($data['obra_social'])) {
                if ($persona->obraSocial) {
                    $persona->obraSocial->update($data['obra_social']);
                } else {
                    $obraSocial = $this->obraSocial($data['obra_social']);
                    $persona->obra_social_id = $obraSocial;
                }
            }

            $persona->update($data['persona']);

            if (isset($data['familiares'])) {
                $this->actualizarFamiliares($persona->id, $data['familiares']);
            }

            if (isset($data['subsidios'])) {
                $this->actualizarSubsidios($persona->id, $data['subsidios']);
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



}