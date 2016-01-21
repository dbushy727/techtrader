<?php

namespace TechTrader\Http\Controllers;

use TechTrader\Http\Controllers\Controller;
use TechTrader\Http\Requests;
use TechTrader\Models\Cart;
use TechTrader\Models\Product;
use TechTrader\Models\User;
use TechTrader\Repos\CartItemRepo;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CartItemRepo $cart_items)
    {
        $this->cart_items = $cart_items;
    }

    public function index()
    {
        return \Auth::user()->cart_items;
    }

    public function add($product_id)
    {
        $this->cart_items->save($product_id);
        return redirect('/cart');
    }

    public function reset()
    {
        $this->cart_items->reset();
        return redirect('/cart');
    }

    public function delete($cart_item_id)
    {
        $this->cart_items->delete($cart_item_id);
        return redirect('/cart');
    }
}
