<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => 'a',
            'email' => 'a@a',
            'user_image' => 'Galaxy.jpg',
            'postcode' => '1111111',
            'address' => '東京都',
            'building' => 'フォレシア',
            'password' => Hash::make(1111111111),
        ];
        DB::table('users')->insert($param);


        $param = [
            'id' => '2',
            'name' => 'z',
            'email' => 'z@z',
            'user_image' => 'Neo-G.png',
            'postcode' => '22222222',
            'address' => '東京都',
            'building' => 'キュービック',
            'password' => Hash::make(1111111111),
        ];
        DB::table('users')->insert($param);
    }
}
