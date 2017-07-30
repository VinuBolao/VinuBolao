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
                "id" => 2,
                "name" => "Gustavo Santos",
                "email" => "gtvslima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 22,
                "name" => "Victor Hugo",
                "email" => "victorhugo.jsantos@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 32,
                "name" => "Marcelo de Melo Lima",
                "email" => "marceloml1804@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 42,
                "name" => "Felipe Lima",
                "email" => "fslima06@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 52,
                "name" => "Douglas Santos",
                "email" => "douglasf.s791@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 62,
                "name" => "Roberto Melo Lima",
                "email" => "roberto.melolima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 72,
                "name" => "Milton de Melo Lima",
                "email" => "miltao601957@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 82,
                "name" => "Denis Santos de Lima",
                "email" => "denis1703@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 92,
                "name" => "Thiago Moreira",
                "email" => "thiago.sanvel10@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 102,
                "name" => "Moacir de Melo Lima",
                "email" => "mlmoacir1910@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 112,
                "name" => "Leandro Reis",
                "email" => "leandro0318@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 122,
                "name" => "Fabrício Lima",
                "email" => "fabriciodelima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 132,
                "name" => "Rubio Lima",
                "email" => "rubio@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 142,
                "name" => "Sidnei Barbosa",
                "email" => "sidnei@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 152,
                "name" => "Maurici Lima",
                "email" => "maurici@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
