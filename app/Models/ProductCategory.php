<?php

namespace TechTrader\Models;

use TechTrader\Models\Lima;

class ProductCategory extends Lima
{
    public function product()
    {
        return $this->belongsTo('TechTrader\Models\Product');
    }

    public function category()
    {
        return $this->belongsTo('TechTrader\Models\Category');
    }
}
