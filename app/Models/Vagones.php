<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Vagones extends Model
{
    use HasFactory;
    protected $table = 'vagones';
    public $timestamps = true;


    protected $fillable = [
        'fecha_vaciado',

        'turno',
        'cant_tolva_vaciado',
        'cant_disponible_tolva',
        'cant_gondola_volteado',
        'cant_disponible_gondola',

    ];
    protected $primaryKey = 'id';


    public static function isExist($fecha_vaciado,$turno)
	{
		return DB::table('vagones')
		->where(['fecha_vaciado'=>$fecha_vaciado,'turno'=>$turno])
		->first()?TRUE:FALSE;
	}



}
