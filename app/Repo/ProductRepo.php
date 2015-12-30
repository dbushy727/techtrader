<?php

namespace App\Repo;

use App\Category;
use App\Product;
use App\ProductCondition as Condition;

class ProductRepo
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Save product with all necessary associations
     *
     * @param  array  $data
     * @return bool
     */
    public function save(array $data)
    {
        $user       = \Auth::user();
        $category   = Category::find(array_pull($data, 'category'));
        $condition  = Condition::find(array_pull($data, 'condition'));
        $product    = new Product($data);

        $product->user()->associate($user);
        $product->condition()->associate($condition);
        return $category->products()->save($product);
    }
}
