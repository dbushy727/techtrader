<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'title',
        'description',
        'price',
    ];

    /**
     * Categories associated with this product
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_categories', 'product_id', 'category_id');
    }

    /**
     * The User that owns this product
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The condition the product is in
     *
     * @return App\Condition
     */
    public function condition()
    {
        return $this->belongsTo('App\ProductCondition', 'product_condition_id');
    }

    /**
     * Images of product
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
}
