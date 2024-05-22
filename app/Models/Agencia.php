<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Agencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='Agencia';

    protected $guarded = [];

    public function datosLaborales(): HasMany
    {
        return $this->hasMany(DatosLaborales::class, 'agencia_id');
    }
    
}
