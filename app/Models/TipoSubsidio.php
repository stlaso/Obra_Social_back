<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class TipoSubsidio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='tipo_subsidio';

    protected $guarded = [];

    public function subsidios(): HasMany
    {
        return $this->HasMany(Subsidios::class, 'tipo_subsidios_id');
    }
    
}
