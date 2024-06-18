<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'username',
        'password',
        'telefono',
        'correo',
        'roles_id',
        'estados_id',
        'seccional_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relaciones
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'roles_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estados_id');
    }


    public function seccional()
    {
        return $this->belongsTo(Seccional::class, 'seccional_id');
    }

    public function persona(): HasMany
    {
        return $this->HasMany(Persona::class, 'users_id');
    }

    public function documentacion(): HasMany
    {
        return $this->HasMany(Documentacion::class, 'users_id');
    }

    public function subsidios(): HasMany
    {
        return $this->HasMany(Subsidios::class, 'users_id');
    }

    public function familiares(): HasMany
    {
        return $this->HasMany(Familiares::class, 'users_id');
    }

}
