<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            ['shipping_address' => 'cairo', 'total_cost' => 100, 'user_id' => 1],
            ['shipping_address' => 'alex', 'total_cost' => 200, 'user_id' => 3],
            ['shipping_address' => 'tanta', 'total_cost' => 300, 'user_id' => 5],
            ['shipping_address' => 'florida', 'total_cost' => 400, 'user_id' => 7],
            ['shipping_address' => 'new york', 'total_cost' => 500, 'user_id' => 9],
            ['shipping_address' => 'washonton', 'total_cost' => 600, 'user_id' => 2],
            ['shipping_address' => 'califorina', 'total_cost' => 700, 'user_id' => 4],
            ['shipping_address' => 'london', 'total_cost' => 800, 'user_id' => 6],
            ['shipping_address' => 'boston', 'total_cost' => 900, 'user_id' => 8],
            ['shipping_address' => 'new jersey', 'total_cost' => 1000, 'user_id' => 10],

        ];

        DB::table('orders')->insert($orders);
    }
}
