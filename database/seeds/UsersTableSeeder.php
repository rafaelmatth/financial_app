<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@email.com',
            'password'=> bcrypt('123456'),
        ]);
        User::create([
            'name'=>'User',
            'email'=>'user@email.com',
            'password'=> bcrypt('123456'),
        ]);
    }
}
