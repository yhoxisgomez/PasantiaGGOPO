<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mineral extends Model
{
    use HasFactory;

    protected $table = 'mineral';
    public $timestamps = true;


    protected $fillable = [
        'nombre',
        'tipo_mineral',


    ];
    protected $primaryKey = 'id';

    //RELACION UNO A MUCHOS MINERAL-DESPACHO
    public function despachos(){
        return $this->hasMany(Despacho::class,'id');
    }





}
