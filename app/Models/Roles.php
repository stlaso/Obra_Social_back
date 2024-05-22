<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use HasFactory;

    protected $table='Roles';

    protected $guarded = [];

    public function (): BelongsTo
    {
        return $this->belongsTo(Domicilio::class, 'domicilio_id');
    }

    
}
