<?php

namespace TechTrader\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use TechTrader\Http\Controllers\Joystick;

class PasswordController extends Joystick
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
