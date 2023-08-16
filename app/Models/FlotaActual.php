<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlotaActual extends Model
{
    use HasFactory;
    protected $table = 'flota_actual';
    public $timestamps = true;


    protected $fillable = [
        'flotaLocomotora4HP_actual',
        'flotaLocomotora2HP_actual',
        'flotaVagonesTolva_actual',
        'flotaVagonesGondola_actual',


    ];
    protected $primaryKey = 'id';
}
