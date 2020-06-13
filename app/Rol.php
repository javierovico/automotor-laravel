<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    const ROL_VENDEDOR_ID = 1;
    const ROL_CAJERO_ID = 2;
    const ROL_VISITANTE_ID = 5;
    protected $fillable = ['nombre'];

    public function permisos(){
        return $this->belongsToMany('App\Permiso');
    }
}
