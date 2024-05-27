<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Tramo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='tramo';

    protected $guarded = [];

    public function datosLaborales(): HasMany
    {
        return $this->hasMany(DatosLaborales::class, 'seccional_id');
    }
}
