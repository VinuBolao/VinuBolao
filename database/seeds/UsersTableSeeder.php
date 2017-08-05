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
                "user" => "gustavo_santos",
                "email" => "gtvslima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 22,
                "name" => "Victor Hugo",
                "user" => "victor_hugo",
                "email" => "victorhugo.jsantos@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 32,
                "name" => "Marcelo Lima",
                "user" => "marcelo_lima",
                "email" => "marceloml1804@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 42,
                "name" => "Felipe Lima",
                "user" => "felipe_lima",
                "email" => "fslima06@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 52,
                "name" => "Douglas Santos",
                "user" => "douglas_santos",
                "email" => "douglasf.s791@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 62,
                "name" => "Roberto Lima",
                "user" => "roberto_lima",
                "email" => "roberto.melolima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 72,
                "name" => "Milton Lima",
                "user" => "milton_lima",
                "email" => "miltao601957@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 82,
                "name" => "Denis Lima",
                "user" => "denis_lima",
                "email" => "denis1703@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 92,
                "name" => "Thiago Moreira",
                "user" => "thiago_moreira",
                "email" => "thiago.sanvel10@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 102,
                "name" => "Moacir Lima",
                "user" => "moacir_lima",
                "email" => "mlmoacir1910@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 112,
                "name" => "Leandro Reis",
                "user" => "leandro_reis",
                "email" => "leandro0318@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 122,
                "name" => "Fabrício Lima",
                "user" => "fabrício_lima",
                "email" => "fabriciodelima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 132,
                "name" => "Rubio Lima",
                "user" => "rubio_lima",
                "email" => "rubio@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 142,
                "name" => "Sidnei Barbosa",
                "user" => "sidnei_barbosa",
                "email" => "sidnei@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 152,
                "name" => "Maurici Lima",
                "user" => "maurici_lima",
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
