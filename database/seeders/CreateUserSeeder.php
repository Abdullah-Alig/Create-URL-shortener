<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'role'=> 1,
               'password'=> bcrypt('12345678'),
            ],
            
        ];

        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    }
}
