<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familiares extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table='familiares';

    protected $guarded = [];

    public function personas(): BelongsTo
    {
        return $this->BelongsTo(Persona::class, 'persona_id');
    }
    public function parentesco(): BelongsTo
    {
        return $this->BelongsTo(Parentesco::class, 'parentesco_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
