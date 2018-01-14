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
                "email" => "gtvslima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 22,
                "name" => "Victor Hugo",
                "username" => "victor.hugo",
                "email" => "victorhugo.jsantos@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 32,
                "name" => "Marcelo Lima",
                "username" => "marcelo.lima",
                "email" => "marceloml1804@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 42,
                "name" => "Felipe Lima",
                "username" => "felipe.lima",
                "email" => "fslima06@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 52,
                "name" => "Douglas Santos",
                "username" => "douglas.santos",
                "email" => "douglasf.s791@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 62,
                "name" => "Roberto Lima",
                "username" => "roberto.lima",
                "email" => "roberto.melolima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 72,
                "name" => "Milton Lima",
                "username" => "milton.lima",
                "email" => "miltao601957@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 82,
                "name" => "Denis Lima",
                "username" => "denis.lima",
                "email" => "denis1703@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 92,
                "name" => "Thiago Moreira",
                "username" => "thiago.moreira",
                "email" => "thiago.sanvel10@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 102,
                "name" => "Moacir Lima",
                "username" => "moacir.lima",
                "email" => "mlmoacir1910@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 112,
                "name" => "Leandro Reis",
                "username" => "leandro.reis",
                "email" => "leandro0318@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 122,
                "name" => "Fabrício Lima",
                "username" => "fabrício.lima",
                "email" => "fabriciodelima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 132,
                "name" => "Rubio Lima",
                "username" => "rubio.lima",
                "email" => "rubio@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 142,
                "name" => "Sidnei Barbosa",
                "username" => "sidnei.barbosa",
                "email" => "sidnei@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 152,
                "name" => "Maurici Lima",
                "username" => "maurici.lima",
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
