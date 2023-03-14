<?php

namespace App\Http\Controllers;

use App\Models\Rol;
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
    
    public function search(Request $request)
    {
        $query = $request->input('q');
    
        $users = Rol::where('codigo_rol', 'LIKE', '%'.$query.'%')
                     ->orWhere('nombre_rol', 'LIKE', '%'.$query.'%')
                     ->select('id','codigo_rol','nombre_rol as name')
                     ->take(15)
                     ->get();
    
        return response()->json($users);
    }     
}