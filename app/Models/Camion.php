<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Camion extends Model
{
    use HasFactory;

    protected $table = 'camion';
    public $timestamps = true;


    protected $fillable = [

        'fecha',
        'turno',
        'viajes',
        'toneladas',
        'cliente_id',
    ];
    protected $primaryKey = 'id';


    protected $with = ['reCliente:nombre,id'];

    //RELACION DE camion-CLIENTE UNO A MUCHO INVERSA
    public function reCliente(){
        return $this->belongsTo('App\Models\Cliente','cliente_id');
    }

}
