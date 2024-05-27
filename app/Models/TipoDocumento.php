<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TipoDocumento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='tipo_documento';

    protected $guarded = [];

    public function datosLaborales(): HasMany
    {
        return $this->hasMany(DatosLaborales::class, 'seccional_id');
    }
}
