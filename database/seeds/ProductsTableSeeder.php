<?php

use App\Product;
use App\ProductCondition;
use App\User;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker          = Faker\Factory::create();
        $user_count      = (User::count() - 1);
        $condition_count = (ProductCondition::count() - 1);

        $brands = [
            'Apple',
            'Hewlett Packard',
            'Lenovo',
            'SanDisk',
            'Dell',
            'Asus',
            'Anchor',
            'Hitachi',
            'Sony',
            'Vizio'
        ];

        $product = new Product([
            'title'         => $faker->sentence(3),
            'description'   => $faker->sentence(15),
            'price'         => $faker->randomFloat(2, 10, 300),
            'brand'         => $brands[array_rand($brands)],
            'model_number'  => str_random(8)
        ]);

        $product->user()->associate(App\User::find(1));
        $product->condition()->associate(App\ProductCondition::find(1));

        $product->save();

        for ($i = 0; $i < 50; $i++) {
            $product = new Product([
                'title' => $faker->sentence(3),
                'description' => $faker->sentence(15),
                'price' => $faker->randomFloat(2, 10, 300),
            ]);

            $user       = App\User::find(rand(1, $user_count));
            $condition  = App\ProductCondition::find(rand(1, $condition_count));

            $product->user()->associate($user);
            $product->condition()->associate($condition);

            $product->save();
        }
    }
}
