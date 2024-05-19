<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObraSocial extends Model
{
    use HasFactory;

    protected $table='Obra_Social';

    protected $guarded = [];

    
    public function obraSociales(): HasMany
    {
        return $this->hasMany(Persona::class, 'obra_social_id');
    }

    
}
