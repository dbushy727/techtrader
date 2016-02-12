<?php

namespace TechTrader\Repos;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use TechTrader\Models\Product;
use TechTrader\Models\ProductImage;

class ImageRepo extends RepoMan
{
    /**
     * Base Path for s3 product images
     *
     * @var string
     */
    protected $s3_basepath = 'https://s3-us-west-2.amazonaws.com/techtrader';

    /**
     * Establish repo
     *
     * @param ProductImage $product_image
     */
    public function __construct(ProductImage $product_image)
    {
        $this->model = $product_image;
    }

    /**
     * Save files to staging area before getting linked to product
     *
     * @param  UploadedFile $file    [description]
     * @param  int $user_id
     * @return void
     */
    public function stage(UploadedFile $file, $user_id)
    {
        $storage_location = storage_path('app/image_staging/' . $user_id);
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move($storage_location, str_replace(' ', '_', $name));
    }

    /**
     * Send image to S3 and save ProductImage to DB
     *
     * @param  Product $product
     * @param  array $image
     * @param  int $primary
     * @return TechTrader\Models\ProductImage
     */
    public function save(Product $product, array $image, $primary = 0)
    {
        $image_path = storage_path("app/{$image['path']}");

        \Storage::put("product_images/{$image['basename']}", file_get_contents($image_path));

        $s3_path = $this->s3_basepath . '/product_images/' . $image['basename'];

        $product_image = $this->model->create([
            'product_id' => $product->id,
            'path'       => $s3_path,
            'primary'    => $primary,
        ]);

        return $product_image;
    }

    /**
     * Get all images staged by the current user
     *
     * @return array staged images
     */
    public function getStagedImages(User $user)
    {
        return \Storage::disk('local')->listContents("image_staging/{$user->id}");
    }

    /**
     * Clear out the image_staging directory for this user
     *
     * @return TechTrader\Repos\ImageRepo
     */
    public function clearStaging(User $user)
    {
        \Storage::disk('local')->deleteDir("/image_staging/{$user->id}");

        return $this;
    }
}
