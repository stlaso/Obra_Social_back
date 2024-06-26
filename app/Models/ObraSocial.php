<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObraSocial extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $table='obra_social';

    protected $guarded = [];

    
    public function obraSociales(): HasMany
    {
        return $this->hasMany(Persona::class, 'obra_social_id');
    }

    
}
