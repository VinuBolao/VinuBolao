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
                "username" => "gustavo_santos",
                "email" => "gtvslima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 22,
                "name" => "Victor Hugo",
                "username" => "victor_hugo",
                "email" => "victorhugo.jsantos@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 32,
                "name" => "Marcelo Lima",
                "username" => "marcelo_lima",
                "email" => "marceloml1804@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 42,
                "name" => "Felipe Lima",
                "username" => "felipe_lima",
                "email" => "fslima06@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 1
            ],
            [
                "id" => 52,
                "name" => "Douglas Santos",
                "username" => "douglas_santos",
                "email" => "douglasf.s791@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 62,
                "name" => "Roberto Lima",
                "username" => "roberto_lima",
                "email" => "roberto.melolima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 72,
                "name" => "Milton Lima",
                "username" => "milton_lima",
                "email" => "miltao601957@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 82,
                "name" => "Denis Lima",
                "username" => "denis_lima",
                "email" => "denis1703@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 92,
                "name" => "Thiago Moreira",
                "username" => "thiago_moreira",
                "email" => "thiago.sanvel10@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 102,
                "name" => "Moacir Lima",
                "username" => "moacir_lima",
                "email" => "mlmoacir1910@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 112,
                "name" => "Leandro Reis",
                "username" => "leandro_reis",
                "email" => "leandro0318@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 122,
                "name" => "Fabrício Lima",
                "username" => "fabrício_lima",
                "email" => "fabriciodelima@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 132,
                "name" => "Rubio Lima",
                "username" => "rubio_lima",
                "email" => "rubio@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 142,
                "name" => "Sidnei Barbosa",
                "username" => "sidnei_barbosa",
                "email" => "sidnei@gmail.com",
                'password' => bcrypt('123456'),
                "master" => 0
            ],
            [
                "id" => 152,
                "name" => "Maurici Lima",
                "username" => "maurici_lima",
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
