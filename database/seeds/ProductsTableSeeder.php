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

        $this->command->info('Products table seeded!');
    }
}
