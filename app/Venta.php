<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['vehiculo_id','comprador_id','vendedor_id'];
    protected $casts = [
        'aprobado' => 'boolean'
    ];

    public function vendedor(){
        return $this->belongsTo(User::class,'vendedor_id','id');
    }

    public function comprador(){
        return $this->belongsTo('App\User','comprador_id','id');
    }

    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo');
    }

    public function facturas(){
        return $this->hasMany('App\Factura');
    }
}
