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
        return $this->hasMany('TechTrader\Models\ProductCategory');
    }
}
