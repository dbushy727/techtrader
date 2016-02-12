<?php

namespace TechTrader\Models;

use TechTrader\Models\Lima;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Lima
{
    use SoftDeletes;

    /**
     * Attributes that are fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'message',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * User that owns this message
     *
     * @return TechTrader\Models\User
     */
    public function user()
    {
        return $this->belongsTo('TechTrader\Models\User');
    }
}
