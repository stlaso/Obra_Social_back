<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;




class Parentesco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='parentesco';

    protected $guarded = [];

    public function familiares(): HasMany
    {
        return $this->HasMany(Familiares::class, 'parentesco_id');
    }

}
