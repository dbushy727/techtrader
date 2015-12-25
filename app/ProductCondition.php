<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCondition extends Model
{

    protected $fillable = ['name'];
    /**
     * The product in this condition
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
