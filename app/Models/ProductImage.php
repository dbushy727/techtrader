<?php

namespace TechTrader\Models;

use TechTrader\Models\Lima;

class ProductImage extends Lima
{
    protected $fillable = ['path', 'primary'];

    public function product()
    {
        return $this->belongsTo('TechTrader\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo('TechTrader\Models\User');
    }

    public function scopePrimary($query)
    {
        return $query->where('primary', 1);
    }
}
