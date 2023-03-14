<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
    
        $users = Skill::where('nombre_skill', 'LIKE', '%'.$query.'%')
                     ->orWhere('codigo_skill', 'LIKE', '%'.$query.'%')
                     ->select('id','codigo_skill','nombre_skill as name')
                     ->take(15)
                     ->get();
    
        return response()->json($users);
    }     
}