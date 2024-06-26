<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Agencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='agencia';

    protected $guarded = [];

    public function ugl(): BelongsTo
    {
        return $this->belongsTo(Ugl::class, 'ugl_id');
    }

    public function datosLaborales(): HasMany
    {
        return $this->hasMany(DatosLaborales::class, 'agencia_id');
    }
    
}
