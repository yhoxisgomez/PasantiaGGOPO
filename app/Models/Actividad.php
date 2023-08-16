<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';
    public $timestamps = true;


    protected $fillable = [
        'fecha',
        'asunto',
        'und_respon',
        'actividad'

    ];
    protected $primaryKey = 'id';
}
