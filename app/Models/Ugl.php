<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ugl extends Model
{
    use HasFactory;

    protected $table='tipo_ugl';

    protected $guarded = [];

    public function datosLaborales(): HasMany
    {
        return $this->hasMany(DatosLaborales::class, 'ugl_id');
    }
    
}
