<?php

namespace TechTrader\Facades;

use Illuminate\Support\Facades\Facade;

class HTTP extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GuzzleHttp\Client';
    }
}
