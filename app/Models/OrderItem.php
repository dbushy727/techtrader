<?php

namespace TechTrader\Models;

class OrderItem extends Lima
{
    /**
     * Attributes that are fillable
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    /**
     * Order from where the item was purchased
     *
     * @return TechTrader\Models\Order
     */
    public function order()
    {
        return $this->belongsTo('TechTrader\Models\Order');
    }
}
