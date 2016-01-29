<?php

namespace TechTrader\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use TechTrader\Models\Lima;

class User extends Lima implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Products owned by this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function products()
    {
        return $this->hasMany('TechTrader\Models\Product');
    }

    /**
     * Messages sent to this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function incoming_messages()
    {
        return $this->hasMany('TechTrader\Models\Message', 'to_user_id', 'id');
    }

    /**
     * Messages sent from this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function outgoing_messages()
    {
        return $this->hasMany('TechTrader\Models\Message', 'from_user_id', 'id');
    }

    /**
     * Cart items that belong this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function cart_items()
    {
        return $this->hasMany('TechTrader\Models\CartItem');
    }
}
