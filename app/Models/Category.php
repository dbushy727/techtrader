<?php

namespace TechTrader\Models;

use TechTrader\Models\Lima;

class Category extends Lima
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Attributes that are fillable
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
        return $this->belongsToMany(
            'TechTrader\Models\Product',
            'product_categories',
            'category_id',
            'product_id'
        )->withTimestamps();
    }
}
