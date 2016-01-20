<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class UserController extends Controller
{
    public function products()
    {
        $products =  \Auth::user()->products()->paginate();

        return view('products.user', compact('products'));
    }

    public function messages()
    {
        $incoming = \Auth::user()->incoming_messages;
        $outgoing = \Auth::user()->outgoing_messages;

        return view('messages.user', compact('incoming', 'outgoing'));
    }
}
