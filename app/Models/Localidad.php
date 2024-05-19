<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Localidad extends Model
{
    use HasFactory;

    protected $table='Localidad';

    protected $guarded = [];

    public function provincias(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'provincia_id');
    }

    
}
