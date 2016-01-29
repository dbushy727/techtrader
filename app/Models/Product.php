<?php

namespace TechTrader\Models;

use Carbon\Carbon;
use TechTrader\Models\Lima;

class Product extends Lima
{
    /**
     * Product Dates
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Fillable Attributes on Product Object
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_condition_id',
        'title',
        'basic_description',
        'description',
        'price',
        'brand',
        'model_number',
    ];

    /**
     * Categories associated with this product
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function categories()
    {
        return $this->belongsToMany('TechTrader\Models\Category', 'product_categories', 'product_id', 'category_id')->withTimestamps();
    }

    /**
     * The User that owns this product
     *
     * @return TechTrader\Models\User
     */
    public function user()
    {
        return $this->belongsTo('TechTrader\Models\User');
    }

    /**
     * The condition the product is in
     *
     * @return TechTrader\Models\Condition
     */
    public function condition()
    {
        return $this->belongsTo('TechTrader\Models\Condition');
    }

    /**
     * Images of product
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function images()
    {
        return $this->hasMany('TechTrader\Models\ProductImage');
    }

    /**
     * Primary Image
     *
     * @return TechTrader\Models\ProductImage
     */
    public function primaryImage()
    {
        return $this->hasOne('TechTrader\Models\ProductImage')->where('primary', 1);
    }
}
