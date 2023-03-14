<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Practica;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function lista(Request $request)
    {
        $pageSize = $request->get('pageSize');
        $pageSize == '' ? $pageSize = 20 : $pageSize;

        $regional = $request->get('regional');
        $tipoProducto = $request->get('tipoproducto');
        $descripcion = $request->get('descripcion');
        $contrato = $request->get('ods');
        $globalSearch = $request->get('globalsearch');

        if ($globalSearch != '') {
            $response = Persona::withoutTrashed()->orderBy('personas.id', 'desc')
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
                    'personas.fecha_retiro',
                    'personas.estado_laboral_desc',
                    'personas.fecha_ingreso',
                    'personas.fecha_nacimiento',
                    'personas.genero',
                    'personas.ciudad_residencia',
                    'personas.estado_civil',
                    'personas.cantidad_hijos',
                    'personas.direccion_residencia',
                    'personas.updated_at'
                )
                ->orderBy('personas.id', 'desc')
                ->paginate($pageSize);
        }

        return response()->json($response);
    }
    
       
    public function searchPost(Request $request)
    {
        $personas = Persona::query();
        if ($request->has('practicas')) {
            /*$codigosPracticas = is_array($request->practicas)
                ? $request->practicas
                : [$request->practicas]; */
            $codigosPracticas = ($request->practicas);   
            
                if (count($codigosPracticas) > 0) {
                    $personas->whereHas('practicas', function ($query) use ($codigosPracticas) {
                        $query->whereIn('practicas.id', $codigosPracticas);
                    })->with('practicas');
                }else{
                    $personas->with('practicas');
                }
        }

        if ($request->has('proyectos')) {
            $codigosProyectos = ($request->proyectos);
            
            if(count($codigosProyectos) > 0){

                $personas->whereHas('proyectos', function ($query) use ($codigosProyectos) {
                    $query->whereIn('proyectos.id', $codigosProyectos);
                })->with('proyectos');
            }else{
                $personas->with('proyectos');   
            }
        } 
        
        if ($request->has('skills')) {
            $codigosSkills = ($request->skills);  
            
                if (count($codigosSkills) > 0) {
                    $personas->whereHas('skills', function ($query) use ($codigosSkills) {
                        $query->whereIn('skills.id', $codigosSkills);
                    })->with('skills');
                }else{
                    $personas->with('skills');
                }
            

        }        

        if ($request->has('roles')) {
            $codigosRoles = ($request->roles);   
                if (count($codigosRoles) > 0) {
                    $personas->whereHas('roles', function ($query) use ($codigosRoles) {
                        $query->whereIn('roles.id', $codigosRoles);
                    })->with('roles');

                }else{
                    $personas->with('roles');
                }
            

        }
        //echo  $personas->toSql();
        $personas = $personas->paginate(10);
        

        

        return response()->json($personas);
    }      
    
    public function index(Request $request)
    {
        $personas = Persona::query();

        if ($request->has('practicas')) {
            /*$codigosPracticas = is_array($request->practicas)
                ? $request->practicas
                : [$request->practicas]; */
            $codigosPracticas = json_decode($request->practicas);   
            

            $personas->whereHas('practicas', function ($query) use ($codigosPracticas) {
                $query->whereIn('practicas.id', $codigosPracticas);
            })->with('practicas');
        }

        if ($request->has('proyectos')) {
            $codigosProyectos = json_decode($request->proyectos);   
            

            $personas->whereHas('proyectos', function ($query) use ($codigosProyectos) {
                $query->whereIn('proyectos.id', $codigosProyectos);
            })->with('proyectos');
        } 
        
        if ($request->has('skills')) {
            $codigosSkills = json_decode($request->skills);   
            

            $personas->whereHas('skills', function ($query) use ($codigosSkills) {
                $query->whereIn('skills.id', $codigosSkills);
            })->with('skills');
        }        

        if ($request->has('roles')) {
            $codigosRoles = json_decode($request->roles);   
            

            $personas->whereHas('roles', function ($query) use ($codigosRoles) {
                $query->whereIn('roles.id', $codigosRoles);
            })->with('roles');
        }

        $personas = $personas->paginate(10);
        

        

        return response()->json($personas);
    }    
}