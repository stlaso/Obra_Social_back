<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='estados';

    protected $guarded = [];

    public function personas(): HasMany
    {
        return $this->hasMany(Persona::class, 'estados_id');
    }

    public function users(): HasMany
    {
        return $this->HasMany(User::class, 'estados_id');
    }


}
