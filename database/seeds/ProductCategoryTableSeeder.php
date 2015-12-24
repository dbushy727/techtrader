<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

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
            $product->categories()->attach($category);
        }
    }
}
