<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class TipoContrato extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='tipo_contrato';

    protected $guarded = [];

    public function documentacion(): HasMany
    {
        return $this->hasMany(Documentacion::class, 'tipo_contrato_id');
    }
}
