<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Rol;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $role1 = Rol::create(['nombre' => 'Admin']);
           $role2 = Rol::create(['nombre' => 'Supervisor']);
           $role3 = Rol::create(['nombre' => 'PMH']);
           $role4 = Rol::create(['nombre' => 'FFCC']);


    }
}
