<?php

namespace TechTrader\Models;

use TechTrader\Models\Lima;

class Condition extends Lima
{
    /**
     * Attributes that are fillable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The product in this condition
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return $this->hasMany('TechTrader\Models\Product');
    }
}
