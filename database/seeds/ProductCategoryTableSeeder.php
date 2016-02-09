<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\Category;
use TechTrader\Models\Product;
use TechTrader\Models\ProductCategory;
use TechTrader\Seeders\Fertilizer;

class ProductCategoryTableSeeder extends Fertilizer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $category_count = Category::count();
        foreach ($products as $product) {
            $category = Category::find(rand(1, $category_count));

            $product->categories()->attach($category);
        }
    }
}
