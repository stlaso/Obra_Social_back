<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='Personas';

    protected $guarded = [];

    
    public function domicilios(): BelongsTo
    {
        return $this->belongsTo(Domicilio::class, 'domicilio_id');
    }

    public function datosLaborales(): BelongsTo
    {
        return $this->belongsTo(DatosLaborales::class, 'datos_laborales_id');
    }

    public function obraSociales(): BelongsTo
    {
        return $this->belongsTo(ObraSocial::class, 'obra_social_id');
    }

    public function nacionalidades(): BelongsTo
    {
        return $this->belongsTo(Nacionalidad::class, 'nacionalidad_id');
    }

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estados_id');
    }

    public function documentaciones(): HasMany
    {
        return $this->HasMany(Documentacion::class, 'persona_id');
    }
    
    public function familiares(): HasMany
    {
        return $this->HasMany(Familiares::class, 'persona_id');
    }

    public function subsidios(): HasMany
    {
        return $this->HasMany(Subsidios::class, 'persona_id');
    }
    
    
}
