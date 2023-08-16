<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class LocomotoraCuatroHP extends Model
{
    use HasFactory;

    protected $table = 'locomotora4hp';
    public $timestamps = true;


    protected $fillable = [
        'fecha',
        'cant_disponible_pto',
        'cant_disponible_mina'


    ];
    protected $primaryKey = 'id';




}
