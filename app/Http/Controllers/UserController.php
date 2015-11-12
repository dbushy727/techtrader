<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;

class UserController extends Controller
{
    public function products()
    {
        return \Auth::user()->products;
    }
}
