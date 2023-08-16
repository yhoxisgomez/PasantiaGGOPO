<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;


class Rol extends Model
{
    use HasFactory, Notifiable,HasRoles;
    protected $table = 'rol';

    protected $fillable = [
        'name',
    ];
    protected $primaryKey = 'id';


}
