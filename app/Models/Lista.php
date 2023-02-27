<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Lista extends Model
{
    use HasFactory;
    protected $table = 'listas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at','deleted_at','estado'
    ];	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
	
	public static function rules(Request $request, $id = null)
    {
		
     	$rules = [
        	'nombre' => 'required|string',
        	'descripcion' => 'required|string'
    	];		
        return $rules;
    }  
}