<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Despacho extends Model
{
    use HasFactory;

    protected $table = 'despachos';
    public $timestamps = true;


    protected $fillable=[
        'fecha',
        'turno',
        'lugar',
        'vagones',
        'toneladas',
        'cliente_id',
        'mineral_id',

    ];
    protected $primaryKey = 'id';


    protected $with = ['reCliente:nombre,id', 'reMineral:nombre,id' ];


    //RELACION DE DESPACHO-CLIENTE UNO A MUCHO INVERSA
    public function reCliente(){
        return $this->belongsTo('App\Models\Cliente','cliente_id');
    }

    //RELACION DE DESPACHO-MINERAL UNO A MUCHO INVERSA
    public function reMineral(){
        return $this->belongsTo('App\Models\Mineral','mineral_id');
    }



}
