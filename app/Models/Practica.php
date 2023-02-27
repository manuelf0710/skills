<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Practica extends Model
{
    use HasFactory;
    protected $table = 'practicas';
    use SoftDeletes;

    protected $fillable = [
        'codigo_practica',
        'nombre_practica',
    ];	

    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public static $directionOrder = ['ASC','ASC'];   
}