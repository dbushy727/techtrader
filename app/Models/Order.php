<?php

namespace TechTrader\Models;

class Order extends Lima
{
    /**
     * Attributes that are fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'subtotal',
        'tax',
        'total',
        'is_paid',
    ];

    /**
     * Items of the order
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function items()
    {
        return $this->hasMany('TechTrader\Models\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('TechTrader\Models\User');
    }
}
