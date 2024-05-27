<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;



class EstadoCivil extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='estado_civil';

    protected $guarded = [];

    public function estadoCivil(): HasMany
    {
        return $this->hasMany(Pesona::class, 'estado_civil_id');
    }
}
