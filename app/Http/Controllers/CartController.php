<?php

namespace TechTrader\Http\Controllers;

use TechTrader\Http\Controllers\Joystick;
use TechTrader\Models\Cart;
use TechTrader\Models\Product;
use TechTrader\Models\User;
use TechTrader\Repos\CartItemRepo;

class CartController extends Joystick
{
    /**
     * Cart Repo
     *
     * @var TechTrader\Repos\CartRepo
     */
    protected $cart;

    public function __construct(CartRepo $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return \Auth::user()->cart;
    }

    public function get($cart_id)
    {
        return $this->cart->find($cart_id);
    }

    public function addItem($cart_id, $product_id)
    {
        $this->cart->addItem($cart_id, $product_id);

        return redirect('/cart');
    }

    public function removeItem($cart_id, $product_id)
    {
        $this->cart->removeItem($cart_item_id);

        return redirect('/cart');
    }

    public function delete($cart_id)
    {
        $this->cart->delete($cart_id);
    }
}
