<?php

use TechTrader\Models\Product;
use TechTrader\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $path = '/assets/img/bear.jpeg';

        foreach ($products as $product) {
            $product->images()->save(new ProductImage([
                'path' => '/assets/img/bear.jpeg',
                'primary' => 1
            ]));

            $random_image_count = rand(1, 5);

            for ($i = 1; $i <= $random_image_count; $i++) {
                $product->images()->save(new ProductImage([
                    'path' => '/assets/img/bear.jpeg',
                    'primary' => 0
                ]));
            }
        }
    }
}
