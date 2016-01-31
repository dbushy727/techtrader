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
    protected $product;

    protected $image_repo;

    /**
     * Establish repo
     *
     * @param Product $product
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
     * @return bool
     */
    public function save(array $data)
    {
        $user       = \Auth::user();
        $category   = Category::find(array_pull($data, 'category'));
        $condition  = Condition::find(array_pull($data, 'condition'));

        $product = new Product($data);

        $product->user()
                ->associate($user)
                ->condition()
                ->associate($condition)
                ->save();

        $product->categories()->attach($category);

        $this->attachImages($product);

        return $product;
    }


    protected function getStagedImages()
    {
        $user = \Auth::user();

        return \Storage::disk('local')->listContents("image_staging/{$user->id}");
    }

    protected function clearStaging()
    {
        $user = \Auth::user();

        \Storage::disk('local')->deleteDir("/image_staging/{$user->id}");

        return $this;
    }

    protected function attachImages(Product $product)
    {
        $images = $this->getStagedImages();

        foreach ($images as $image) {
            $this->image_repo->save($product, $image);
        }

        $this->clearStaging();

        return $this;
    }
}
