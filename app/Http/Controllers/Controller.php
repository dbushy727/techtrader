<?php

namespace TechTrader\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use TechTrader\Http\Controllers\Joystick;

abstract class Controller extends Joystick
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
