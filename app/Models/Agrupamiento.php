<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agrupamiento extends Model
{
    use HasFactory;


    protected $table='agrupamiento';

    protected $guarded = [];

    public function documentacion(): HasMany
    {
        return $this->hasMany(Documentacion::class, 'agrupamiento_id');
    }

}
