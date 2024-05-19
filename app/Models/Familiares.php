<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Familiares extends Model
{
    use HasFactory;

    
    protected $table='familiares';

    protected $guarded = [];

    public function personas(): BelongsTo
    {
        return $this->BelongsTo(Persona::class, 'persona_id');
    }

}
