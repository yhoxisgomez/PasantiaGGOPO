<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    User::create([
	'name' => 'Rafael Villarroel',
	'email' => 'rafaelvz2601@gmail.com',
	'password' => bcrypt('88819051'),
    'rol_id' => 1,
    ]);

    User::create([
        'name' => 'Yhoxis Gomez',
        'email' => 'yhoxisgomezacevedo@gmail.com',
        'password' => bcrypt('27256382'),
        'rol_id' => 1,
    ]);
    User::create([
        'name' => 'Thais C',
        'email' => 'tcollr18@gmail.com',
        'password' => bcrypt('thais487$'),
        'rol_id' => 1,
    ]);

    User::create([
        'name' => 'UsuarioPMH',
        'email' => 'usuariopmh@gmail.com',
        'password' => bcrypt('9876543210'),
        'rol_id' => 3,
    ]);

    User::create([
        'name' => 'UsuarioFFCC',
        'email' => 'usuarioffcc@gmail.com',
        'password' => bcrypt('0123456789'),
        'rol_id' => 4,
    ]);

    //User::factory(9)->create();

    }
}
