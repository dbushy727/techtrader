<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
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
        return $this->hasMany('App\Product');
    }

    /**
     * Messages sent to this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function incoming_messages()
    {
        return $this->hasMany('App\Message', 'to_user_id', 'id');
    }

    /**
     * Messages sent from this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function outgoing_messages()
    {
        return $this->hasMany('App\Message', 'from_user_id', 'id');
    }

    /**
     * Cart items that belong this user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function cart_items()
    {
        return $this->hasMany('App\CartItem');
    }
}
