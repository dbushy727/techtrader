<?php

namespace TechTrader\Models;

use TechTrader\Models\Lima;

class CartItem extends Lima
{
    /**
     * Attributes that are fillable
     *
     * @var array
     */
    protected $fillable = [
        'cart_id',
        'product_id'
    ];

    /**
     * Cart that owns this cart item
     *
     * @return TechTrader\Models\Cart
     */
    public function cart()
    {
        return $this->belongsTo('TechTrader\Models\Cart');
    }

    /**
     * Product is part of this cart item
     *
     * @return TechTrader\Models\Product
     */
    public function product()
    {
        return $this->belongsTo('TechTrader\Models\Product');
    }
}
