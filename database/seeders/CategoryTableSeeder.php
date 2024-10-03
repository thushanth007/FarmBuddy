<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use DateTime;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'title'  => 'Vegetables & Fruit',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/vegetable.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Beverages',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/cup.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Meats & Seafood',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/meats.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Grocery & Staples',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/grocery.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Milk & Dairies',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/milk.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Frozen Foods',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/frozen.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Breakfast',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/breakfast.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'title'  => 'Biscuits & Snacks',
                'icon' => 'https://themes.pixelstrap.com/fastkart/assets/svg/1/biscuit.svg',
                'status' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        ]);
    }
}
