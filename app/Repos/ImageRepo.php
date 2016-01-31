<?php

namespace TechTrader\Repos;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use TechTrader\Models\Product;
use TechTrader\Models\ProductImage;

class ImageRepo
{
    protected $product_image;

    protected $s3_basepath = 'https://s3-us-west-2.amazonaws.com/techtrader';

    /**
     * Establish repo
     *
     * @param ProductImage $product_image
     */
    public function __construct(ProductImage $product_image)
    {
        $this->product_image = $product_image;
    }

    public function stage(UploadedFile $file, $user_id)
    {
        $storage_location = storage_path('app/image_staging/' . $user_id);
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move($storage_location, $name);
    }

    public function save(Product $product, $image)
    {
        $image_path = storage_path("app/{$image['path']}");

        \Storage::put("product_images/{$image['basename']}", file_get_contents($image_path));

        $s3_path = $this->s3_basepath . '/product_images/' . $image['basename'];

        $primary = (bool) !$product->images->count();

        $product_image = ProductImage::create([
            'product_id' => $product->id,
            'path'       => $s3_path,
            'primary'    => $primary,
        ]);

        return $product_image;
    }
}
