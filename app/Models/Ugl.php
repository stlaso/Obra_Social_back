<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ugl extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='tipo_ugl';

    protected $guarded = [];

    public function agencia(): HasMany
    {
        return $this->hasMany(Agencia::class, 'ugl_id');
    }
    
}
