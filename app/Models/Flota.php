<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flota extends Model
{
    use HasFactory;
    protected $table = 'flota';
    public $timestamps = true;


    protected $fillable = [
        'flotaLocomotora4HP',
        'flotaLocomotora2HP',
        'flotaVagonesTolva',
        'flotaVagonesGondola',

    ];
    protected $primaryKey = 'id';
}
