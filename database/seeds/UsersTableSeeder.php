<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор не известен',
                'email' => 'author_unknown@gmail.cm',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name' => 'Author',
                'email' => 'author@gmail.cm',
                'password' => bcrypt('123123'),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
