<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function listado(Request $request)
    {
        $pageSize = $request->get('pageSize');
        $pageSize == '' ? $pageSize = 20 : $pageSize;

        $regional = $request->get('regional');
        $tipoProducto = $request->get('tipoproducto');
        $descripcion = $request->get('descripcion');
        $contrato = $request->get('ods');
        $globalSearch = $request->get('globalsearch');

        if ($globalSearch != '') {
            $response = Persona::withoutTrashed()->orderBy('productos_repso.id', 'desc')
                ->globalSearch($globalSearch)
                ->paginate($pageSize);
        } else {
            $response = //ProductoRepso::with('regional', 'contrato', 'tipoproducto', 'profesional')->withoutTrashed()
                Persona::withoutTrashed()
                ->select(
                    'personas.id',
                    'personas.codigo_persona',
                    'personas.nombre_persona',
                    'personas.apellido_persona',
                    'personas.correo_corporativo',
                    'personas.correo_personal',
                    'personas.rol_actual',
                    'personas.pais',
                    'personas.ciudad',
                    'personas.estado',
                    'users.name as profesional',
                    'tipo_productos.name as tipoproducto',
                    'regionales.nombre as regional'
                )
                ->join('regionales', 'productos_repso.regional_id', '=', 'regionales.id')
                ->join('contratos', 'productos_repso.contrato_id', '=', 'contratos.id')
                ->join('tipo_productos', 'productos_repso.tipoproducto_id', '=', 'tipo_productos.id')
                ->join('users', 'productos_repso.profesional_id', '=', 'users.id')
                ->orderBy('productos_repso.id', 'desc')
                ->paginate($pageSize);
        }

        return response()->json($response);
    }    
}