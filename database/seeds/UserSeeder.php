<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'dni' => '78451233',
            'nombre' => 'Pedro Diaz',
            'correo'  => 'admin@admin', 
            'password' => bcrypt('admin'), 
            'rol_id'  => 1
        ]);
        User::create([
            'dni' => '00012456',
            'nombre' => 'Juan Gomez',
            'correo'  => 'user@user', 
            'password' => bcrypt('user'), 
            'rol_id'  => 2
        ]);
    }
}
