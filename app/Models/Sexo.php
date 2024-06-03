<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Sexo extends Model
{
    use HasFactory;


    protected $table='sexo';

    protected $guarded = [];

    public function sexo(): HasMany
    {
        return $this->hasMany(Persona::class, 'sexo_id');
    }
}

