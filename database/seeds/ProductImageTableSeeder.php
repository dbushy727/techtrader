<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\Product;
use TechTrader\Models\ProductImage;
use TechTrader\Seeders\Fertilizer;

class ProductImageTableSeeder extends Fertilizer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $path = 'https://s3-us-west-2.amazonaws.com/techtrader/product_images/bear.jpeg';

        foreach ($products as $product) {
            $product->images()->save(new ProductImage([
                'path' => $path,
                'primary' => 1
            ]));

            $random_image_count = rand(1, 5);

            for ($i = 1; $i <= $random_image_count; $i++) {
                $product->images()->save(new ProductImage([
                    'path' => $path,
                    'primary' => 0
                ]));
            }
        }
    }
}
