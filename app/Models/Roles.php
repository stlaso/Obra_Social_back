<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    protected $table='Roles';

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->HasMany(User::class, 'users_id');
    }


}
