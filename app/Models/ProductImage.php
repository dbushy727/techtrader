<?php

namespace TechTrader\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
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
}
