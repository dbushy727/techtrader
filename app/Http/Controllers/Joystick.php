<?php

namespace TechTrader\Http\Controllers;

use TechTrader\Http\Controllers\Controller;
use TechTrader\Http\Requests;
use TechTrader\Http\Requests\Request;

class Joystick extends Controller
{
    /**
     * Request coming in from web
     *
     * @var TechTrader\Http\Requests\Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
