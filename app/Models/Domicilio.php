<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Domicilio extends Model
{
    use HasFactory;
    

    protected $table='Domicilio';

    protected $guarded = [];

    public function localidades(): BelongsTo
    {
        return $this->belongsTo(Localidad::class, 'localidad_id');
    }
    
    public function provincias(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class, 'domilicio_id');
    }
}
