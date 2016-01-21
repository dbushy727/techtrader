<?php

namespace TechTrader\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Fillable Attributes on Product Object
     *
     * @var array
     */
    protected $fillable = [
        'to_user_id',
        'subject',
        'body',
    ];

    /**
     * Recipient of message
     *
     * @return TechTrader\Models\User
     */
    public function recipient()
    {
        return $this->hasOne('TechTrader\Models\User', 'id', 'to_user_id');
    }

    /**
     * Sender of message
     *
     * @return TechTrader\Models\User
     */
    public function sender()
    {
        return $this->hasOne('TechTrader\Models\User', 'id', 'from_user_id');
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', 0);
    }
}
