<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\Category;
use TechTrader\Models\Product;
use TechTrader\Models\ProductCategory;

class ProductCategoryTableSeeder extends Seeder
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

            $params = [
                'product_id' => $product->id,
                'category_id' => $category->id,
            ];

            app('TechTrader\Models\ProductCategory')->create($params);
        }
    }
}
