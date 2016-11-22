<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'username'    => 'user',
            'first_name'    => 'test',
            'last_name'     => 'user',
            'email'         => 'user@example.com',
            'password'      => Hash::make('password'),
            'token'         => str_random(64),
            'activated'     => true
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'username'    => 'admin',
            'first_name'    => 'test',
            'last_name'     => 'admin',
            'email'         => 'admin@example.com',
            'password'      => Hash::make('adminpassword'),
            'token'         => str_random(64),
            'activated'     => true
        ));
        $user->assignRole($userRole);
    }
}