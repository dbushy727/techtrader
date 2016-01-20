<?php

namespace App\Repos;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCondition as Condition;
use App\Models\User;
use App\Models\ProductImage;

class ProductRepo
{
    protected $product;

    /**
     * Establish repo
     *
     * @param Product $product
     */
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

        $product = new Product($data);

        $product->user()->associate($user)
            ->condition()->associate($condition);

        $product->save();

        $product->categories()->attach($category);

        return $product;

        $this->attachImages($product);

        return $product->id;
    }


    protected function getStagedImages()
    {
        $user   = \Auth::user();
        $images = \Storage::listContents("image_staging/{$user->id}");

        $images = array_map(function ($image) {
            $product_image = new ProductImage([
                'path' => storage_path("app/{$image->path}")
            ]);

            return $product_image;
        }, $images);

        return $images;
    }

    protected function attachImages(Product $product)
    {
        $images = $this->getStagedImages();

        foreach ($images as $image) {
            $image->product()->associate($product)->save();
        }

        return $this;
    }
}