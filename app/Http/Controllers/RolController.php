<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function store(Request $request){
        $request->validate(['nombre_rol' => 'required']);

    }

    public function rolesAll()
    {
        $estadosLista = DB::table("roles")
            ->select('id','codigo_rol','nombre_rol')
            ->get();

        return response()->json($estadosLista);
    }    
}