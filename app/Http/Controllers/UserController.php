<?php

namespace TechTrader\Http\Controllers;

use Illuminate\Http\Request;

use TechTrader\Http\Requests;
use TechTrader\Http\Controllers\Controller;
use TechTrader\Models\Product;
use TechTrader\Models\User;

class UserController extends Controller
{
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
