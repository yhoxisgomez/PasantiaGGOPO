<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class LocomotoraDosHP extends Model
{
    use HasFactory;

    protected $table = 'locomotora2hp';
    public $timestamps = true;


    protected $fillable = [
        'fecha',
        'cant_disponible',


    ];
    protected $primaryKey = 'id';



}
