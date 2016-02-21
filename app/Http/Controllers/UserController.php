<?php

namespace TechTrader\Http\Controllers;

use TechTrader\Http\Controllers\Joystick;
use TechTrader\Models\Category;
use TechTrader\Models\Product;
use TechTrader\Models\User;

class UserController extends Joystick
{
    public function home()
    {
        $products = Product::with(['user', 'categories', 'condition'])->take(4)->get();

        $categories = Category::all();
        return view('users.home', compact('products', 'categories'));
    }

    public function products()
    {
        $products =  \Auth::user()->products()->paginate();

        return view('users.products', compact('products'));
    }

    public function messages()
    {
        $incoming = \Auth::user()->incoming_messages;
        $outgoing = \Auth::user()->outgoing_messages;

        return view('messages.user', compact('incoming', 'outgoing'));
    }
}
