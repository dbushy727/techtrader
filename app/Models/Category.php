<?php

namespace TechTrader\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Fillable attributes of a category
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Products that are included in this category
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return $this->belongsToMany('TechTrader\Models\Product', 'product_categories');
    }
}
