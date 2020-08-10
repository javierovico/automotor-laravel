<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller{

    public function index(){
        return Vehiculo::all();
    }

    public function store(Request $request){
        $vehiculo = new Vehiculo($request->all());
        $vehiculo->save();
        return $vehiculo;
    }

    public function show($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
