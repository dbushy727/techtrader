<?php

namespace TechTrader\Repos;

use TechTrader\Models\Category;
use TechTrader\Models\Condition;
use TechTrader\Models\Product;
use TechTrader\Models\ProductImage;
use TechTrader\Models\User;
use TechTrader\Repos\ImageRepo;

class ProductRepo
{
    /**
     * Image Repo
     *
     * @var TechTrader\Repos\ImageRepo
     */
    protected $image_repo;

    /**
     * Establish Product and ImageRepo
     *
     * @param Product $product
     * @param ImageRepo $image_repo
     */
    public function __construct(Product $product, ImageRepo $image_repo)
    {
        $this->model      = $product;
        $this->image_repo = $image_repo;
    }

    /**
     * Save Product with all associations
     *
     * @param  User      $user
     * @param  Category  $category
     * @param  Condition $condition
     * @param  array     $params
     * @return TechTrader\Models\Product
     */
    public function save(User $user, Category $category, Condition $condition, array $params)
    {
        $product = new $this->model->firstOrNew($params);

        // Create product with a user and condition
        $product->user()
                ->associate($user)
                ->condition()
                ->associate($condition)
                ->save();

        $product->categories()->attach($category);

        // Attach any staged images to this product
        $this->attachImages($product);

        return $product;
    }

    /**
     * Attach images to a product
     *
     * @param  Product $product
     *
     * @return TechTrader\Repos\ProductRepo
     */
    protected function attachImages(Product $product)
    {
        $user = $product->user;

        $images = $this->image_repo->getStagedImages($user);

        $primary = (bool) !$product->images->count();

        foreach ($images as $image) {
            $this->image_repo->save($product, $image, $primary);

            $primary = 0;
        }

        $this->image_repo->clearStaging($user);

        return $this;
    }
}
