<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticaController extends Controller
{
    public function store(Request $request){
        $request->validate(['codigo_practica' => 'required', 'nombre_practica'=>'required']);

    }

    public function practicasAll()
    {
        $practicasLista = DB::table("practicas")
            ->select('id','codigo_practica','nombre_practica')
            ->get();

        return response()->json($practicasLista);
    }  
}