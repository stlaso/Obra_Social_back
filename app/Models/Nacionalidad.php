<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Nacionalidad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='nacionalidad';

    protected $guarded = [];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class, 'nacionalidad_id');
    }

    
}
