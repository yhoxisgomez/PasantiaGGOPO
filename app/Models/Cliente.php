<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    public $timestamps = true;


    protected $fillable=[
        'nombre',
        'tipo_cliente',


    ];
    protected $primaryKey = 'id';

    //RELACION UNO A MUCHOS CLIENTE-DESPACHO
    public function despachos(){
        return $this->hasMany(Despacho::class,'id');
    }

    //RELACION UNO A MUCHOS CLIENTE-CAMION
    public function camion(){
        return $this->hasMany(Camion::class,'id');
    }




    public static function isExist($tipo_cliente,$nombre)
    {
        return DB::table('clientes')
        ->where(['tipo_cliente'=>$tipo_cliente,'nombre_cliente'=>$nombre])
        ->first()?TRUE:FALSE;
    }
}
