<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property mixed rol_id
 * @property mixed documento
 * @property mixed rol
 * @method static User find($id)
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    const ADMIN_DEFAULT_PASSWORD = 'adm1n';
    const ADMIN_DEFAULT_EMAIL = 'admin@automotor.com.py';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'apellido',
        'documento',
        'telefono',
        'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol(){
        return $this->belongsTo(Rol::class);
    }

    public static function getVendedores(){
        return self::query()->where('rol_id',2);
    }
}
