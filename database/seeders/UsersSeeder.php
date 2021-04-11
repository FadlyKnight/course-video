<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'Huda',
                'email' => 'Huda@gmail.com',
                'password' => 'password',
            ],
            [
                'name' => 'Hudin',
                'email' => 'Hudain@gmail.com',
                'password' => 'password', 
            ]
        ]);
    }
}
