<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subsidios extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table='subsidios';

    protected $guarded = [];

    public function personas(): BelongsTo
    {
        return $this->BelongsTo(Persona::class, 'persona_id');
    }

    public function tipoSubsidio(): BelongsTo
    {
        return $this->BelongsTo(TipoSubsidio::class, 'tipo_subsidio_id');
    }
    
}
