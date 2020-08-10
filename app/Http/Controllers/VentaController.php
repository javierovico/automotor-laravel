<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller{

    public function index(Request $request){
        $query = Venta::query()->with('vendedor','comprador','vehiculo','facturas');
        if($vendedor_id = $request->get('vendedor_id')){
            $query->where('vendedor_id',$vendedor_id);
        }
        return $query->get();
    }

    public function store(Request $request){
        $venta = new Venta([
            'vehiculo_id' => $request->vehiculo_id,
            'comprador_id' => $request->user()->id,
            'vendedor_id' => $request->vendedor_id
        ]);
        $venta->save();
        return $venta;
    }
}
