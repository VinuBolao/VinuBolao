<?php

use Bolao\User;
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
                'id' => 2,
                'name' => 'Gustavo Santos',
                'email' => 'gustavo@teste.com',
                'master' => 1,
                'password' => bcrypt('123456')
            ],
            [
                'id' => 12,
                'name' => 'Felipe Santos',
                'email' => 'felipe@teste.com',
                'password' => bcrypt('123456')
            ],
            [
                'id' => 22,
                'name' => 'Victor Hugo',
                'email' => 'victor@teste.com',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
