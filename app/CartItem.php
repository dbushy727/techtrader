<?php

namespace App;

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
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Product is part of this cart item
     *
     * @return App\Product
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
