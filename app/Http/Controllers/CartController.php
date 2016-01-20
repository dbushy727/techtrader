<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Repo\CartItemRepo;
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
