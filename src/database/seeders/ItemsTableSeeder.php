<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'item_id' => '1',
            'id' => '1',
            'item_name' => 'Galaxy Doragon',
            'item_image' => 'Galaxy.jpg',
            'brand' => 'gutti',
            'price' => '25000',
            'category' => 'Doragon',
            'status' => 'GOD',
            'description' => 'SHARK',
        ];
        DB::table('items')->insert($param);

        $param = [
            'item_id' => '2',
            'id' => '2',
            'item_name' => 'Neo-Galaxy Doragon',
            'item_image' => 'Neo-G.png',
            'brand' => 'gutties',
            'price' => '125000',
            'category' => 'Doragon',
            'status' => 'GOD',
            'description' => 'SHARKsan',
        ];
        DB::table('items')->insert($param);
    }
}
