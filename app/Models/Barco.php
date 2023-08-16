<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Barco extends Model
{
    use HasFactory;

    protected $table = 'barco';
    public $timestamps = true;


    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'turno_inicio',
        'turno_fin',
        'lugar_carga',
        'tipo_barco',
        'toneladas_fmo',
        'toneladas_cliente'


    ];
    protected $primaryKey = 'id';



}
