<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    
    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
