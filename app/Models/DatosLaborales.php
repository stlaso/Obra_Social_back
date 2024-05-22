<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class DatosLaborales extends Model
{
    use HasFactory;


    protected $table='datos_laborales';

    protected $guarded = [];

    public function ugl(): BelongsTo
    {
        return $this->belongsTo(Ugl::class, 'ugl_id');
    }

    public function agencias(): BelongsTo
    {
        return $this->belongsTo(Agencia::class, 'agencia_id');
    }

    public function seccionales(): BelongsTo
    {
        return $this->belongsTo(Seccional::class, 'seccional_id');
    }

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class, 'datos_laborales_id');
    }

    
}
