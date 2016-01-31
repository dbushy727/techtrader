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
     * Product
     *
     * @var TechTrader\Models\Product
     */
    protected $product;

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
        $this->product = $product;
        $this->image_repo = $image_repo;
    }

    /**
     * Save product with all necessary associations
     *
     * @param  array  $data
     *
     * @return bool
     */
    public function save(array $data)
    {
        $user       = \Auth::user();
        $category   = Category::find(array_pull($data, 'category'));
        $condition  = Condition::find(array_pull($data, 'condition'));

        $product = new Product($data);

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
        $images = $this->image_repo->getStagedImages();

        $primary = (bool) !$product->images->count();

        foreach ($images as $image) {
            $this->image_repo->save($product, $image, $primary);

            $primary = 0;
        }

        $this->image_repo->clearStaging();

        return $this;
    }
}
