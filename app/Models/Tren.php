<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Tren extends Model
{
    use HasFactory;

    protected $table = 'tren';
    public $timestamps = true;


    protected $fillable = [
        'fecha_llegada',

        'turno',
        'lugar_inicial',
        'numero',
        'contenido',
        'vagon_id',
    ];
    protected $primaryKey = 'id';

    protected $with = ['vagones:id'];
    //RELACION UNO A MUCHOS INVERSA TREN-VAGON
    public function vagones(){
        return $this->belongsTo('App\Models\Vagones','vagon_id');
    }

    //RELACION UNO A MUCHOS TREN-LOCOMOTORA2HP
    public function locomotora2hp(){
        return $this->hasMany(LocomotoraDosHP::class,'id');
    }

    //RELACION UNO A MUCHOS TREN-LOCOMOTORA4HP
    public function locomotora4hp(){
        return $this->hasMany(LocomotoraCuatroHP::class,'id');
    }
    public static function isExist($fecha_llegada,$turno)
	{
		return DB::table('tren')
		->where(['fecha_llegada'=>$fecha_llegada,'turno'=>$turno])
		->first()?TRUE:FALSE;
	}



}
