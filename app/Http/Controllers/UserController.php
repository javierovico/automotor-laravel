<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function index(Request $request){
        return User::all();
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->only(['name', 'email', 'password', 'apellido', 'documento', 'telefono', 'rol_id']));
        return $user;
    }

    public function vendedores(Request $request){
        return User::getVendedores()->get();
    }

}
