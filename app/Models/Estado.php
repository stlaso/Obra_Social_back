<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    use HasFactory;
    protected $table='estados';

    protected $guarded = [];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class, 'estados_id');
    }


}
