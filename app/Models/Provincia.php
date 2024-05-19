<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provincia extends Model
{
    use HasFactory;

    protected $table='provincias';

    protected $guarded = [];

    public function localidades(): HasMany
    {
        return $this->hasMany(Localidad::class, 'provincia_id');
    }


    public function domicilios(): HasMany
    {
        return $this->hasMany(Domicilio::class, 'provincia_id');
    }

    
}
