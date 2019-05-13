<?php

use Bolao\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                "id" => 2,
                "name" => "Gustavo Santos",
                "username" => "gustavo.santos",
                "email" => "gustavo.santos@vinubolao.com.br",
                'password' => bcrypt('123456'),
                "master" => 1
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
