<?php

namespace TechTrader\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Lima
{
    use SoftDeletes;

    /**
     * Attributes that are fillable
     *
     * @var array
     */
    protected $fillable = ['user_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The user that owns this cart
     *
     * @return TechTrader\Models\User
     */
    public function user()
    {
        return $this->belongsTo('TechTrader\Models\User');
    }

    /**
     * The items in this cart
     *
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function items()
    {
        return $this->hasMany('TechTrader\Models\CartItem');
    }


}
