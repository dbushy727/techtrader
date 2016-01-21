<?php

namespace TechTrader\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_id'
    ];
    /**
     * User that owns this cart item
     *
     * @return TechTrader\Models\User
     */
    public function user()
    {
        return $this->belongsTo('TechTrader\Models\User');
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
