<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\Category;
use TechTrader\Seeders\Fertilizer;

class CategoryTableSeeder extends Fertilizer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Computers',
                'icon' => 'fa fa-laptop'
            ],
            [
                'name' => 'Tablets',
                'icon' => 'fa fa-tablet'
            ],
            [
                'name' => 'Gaming',
                'icon' => 'fa fa-gamepad'
            ],
            [
                'name' => 'Networking',
                'icon' => 'fa fa-wifi'
            ],
            [
                'name' => 'General',
                'icon' => 'fa fa-print'
            ],
            [
                'name' => 'Audio',
                'icon' => 'fa fa-headphones'
            ],
            [
                'name' => 'Accessories',
                'icon' => 'fa fa-keyboard-o'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => array_get($category, 'name'),
                'icon' => array_get($category, 'icon')
            ]);
        }
    }
}
