<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function store(Request $request){
        $request->validate(['codigo_proyecto' => 'required', 'nombre_cliente'=>'required']);

    }

    public function proyectosAll()
    {
        $proyectosLista = DB::table("proyectos")
            ->select('id','codigo_proyecto','nombre_cliente')
            ->get();

        return response()->json($proyectosLista);
    }  
}