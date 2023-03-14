<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
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
    
    public function proyectosSearch()
    {
        $proyectosLista = DB::table("proyectos")
            ->select('id','codigo_proyecto','nombre_cliente as name')
            ->get();

        return response()->json($proyectosLista);
    } 
    
    public function search(Request $request)
    {
        $query = $request->input('q');
    
        $users = Proyecto::where('nombre_cliente', 'LIKE', '%'.$query.'%')
                     ->orWhere('codigo_proyecto', 'LIKE', '%'.$query.'%')
                     ->select('id','codigo_proyecto','nombre_cliente as name')
                     ->take(15)
                     ->get();
    
        return response()->json($users);
    }    
}