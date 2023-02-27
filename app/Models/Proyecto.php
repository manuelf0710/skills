<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    use SoftDeletes;

    protected $fillable = [
        'codigo_proyecto',
        'nombre_cliente',
    ];	

    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public static $directionOrder = ['ASC','ASC'];   
}