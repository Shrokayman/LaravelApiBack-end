<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'jacket',
            'image' => 'img/feature_prod_01.jpg',
            'description' =>Str::random(10),
            'price' => 100,
            'discount' => 10,
            'category_id' => 1,
            'brand_id' => 1
        ],
            ['name' => 't-shirt',
            'image' => 'img/feature_prod_01.jpg',
            'description' => 'img/feature_prod_01.jpg',
            'price' => 120,
            'discount' => 15,
            'category_id' => 2,
            'brand_id' => 2
        ],
            ['name' => 'hat',
            'image' => 'img/feature_prod_01.jpg',
            'description' =>Str::random(10),
            'price' => 100,
            'discount' => 20,
            'category_id' => 3,
            'brand_id' => 3
        ],
            ['name' => 'trendi',
            'image' => 'img/feature_prod_02.jpg',
            'description' =>Str::random(10),
            'price' => 150,
            'discount' => null,
            'category_id' => 4,
            'brand_id' => 4
        ],
            ['name' => 'elegent',
            'image' =>'img/feature_prod_02.jpg',
            'description' =>Str::random(10),
            'price' => 200,
            'discount' => 10,
            'category_id' => 5,
            'brand_id' => 5
        ],
            ['name' => 'cool',
            'image' => 'img/feature_prod_03.jpg',
            'description' =>Str::random(10),
            'price' => 100,
            'discount' => null,
            'category_id' => 6,
            'brand_id' => 6
        ],
            ['name' => 'funky',
            'image' => 'img/feature_prod_03.jpg',
            'description' =>Str::random(10),
            'price' => 300,
            'discount' => 30,
            'category_id' => 7,
            'brand_id' => 7
        ],
            ['name' => 'trade',
            'image' => 'img/feature_prod_03.jpg',
            'description' =>Str::random(10),
            'price' => 300,
            'discount' => 30,
            'category_id' => 8,
            'brand_id' => 8,
        ],
            ['name' => 'sport',
            'image' => 'img/feature_prod_03.jpg',
            'description' =>Str::random(10),
            'price' => 300,
            'discount' => 30,
            'category_id' => 9,
            'brand_id' => 9
        ],
            ['name' => 'casual',
            'image' => 'img/feature_prod_03.jpg',
            'description' =>Str::random(10),
            'price' => 300,
            'discount' => null,
            'category_id' => 10,
            'brand_id' => 10
        ],
        ];

        DB::table('products')->insert($products);
    }
}
