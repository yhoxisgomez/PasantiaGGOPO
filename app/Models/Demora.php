<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Demora extends Model
{
    use HasFactory;

    protected $table = 'demoras';
    public $timestamps = true;

    protected $fillable=[
        'fecha',

        'turno',
        'departamento',
        'descripcion'

    ];

    public static function isExist($fecha,$departamento)
    {
        return DB::table('demoras')
        ->where(['fecha'=>$fecha,'departamento'=>$departamento])
        ->first()?TRUE:FALSE;
    }


}
