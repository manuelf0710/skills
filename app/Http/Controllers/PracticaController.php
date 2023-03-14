<?php

namespace App\Http\Controllers;

use App\Models\Practica;
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

    public function search(Request $request)
    {
        $query = $request->input('q');
    
        $users = Practica::where('nombre_practica', 'LIKE', '%'.$query.'%')
                     ->orWhere('codigo_practica', 'LIKE', '%'.$query.'%')
                     ->select('id','codigo_practica','nombre_practica as name')
                     ->take(15)
                     ->get();
    
        return response()->json($users);
    }     
}