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
            'name'      => 'Administrador master',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('12345678'),
        ]);

        User::create([
            'name'      => 'Usuario comum',
            'email'     => 'user@user.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
