<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Documentacion extends Model
{
    use HasFactory;


    protected $table='documentacion';

    protected $guarded = [];


    public function personas(): BelongsTo
    {
        return $this->BelongsTo(Persona::class, 'persona_id');
    }
    public function tipoDocumento(): BelongsTo
    {
        return $this->BelongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
