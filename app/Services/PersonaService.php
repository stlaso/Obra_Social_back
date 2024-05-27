<?php

namespace App\Services;

use App\Models\Persona;
use App\Models\Domicilio;
use App\Models\DatosLaborales;
use App\Models\obraSocial;
use App\Models\Familiares;
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


}