<?php

namespace App;

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
     * @return App\User
     */
    public function recipient()
    {
        return $this->hasOne('App\User', 'id', 'to_user_id');
    }

    /**
     * Sender of message
     *
     * @return App\User
     */
    public function sender()
    {
        return $this->hasOne('App\User', 'id', 'from_user_id');
    }
}
